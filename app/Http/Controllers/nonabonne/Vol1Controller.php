<?php
namespace App\Http\Controllers\nonabonne;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vol;
use App\Models\Offer;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class Vol1Controller extends Controller
{
    public function index(Request $request)
    {
        $vols = Vol::all();
        $client = Auth::guard('client')->user();
        $name = $client->name;
        $email = $client->email;

        // Vérifier si c'est la première réservation du client
        $isFirstReservation = !$client->reservations()->exists();

        // Vérifier si le client a accédé à partir de l'offre 1
        $fromOffer1 = $request->input('offer') == 1;

        return view('client.nonabonne.reserver.reserver_vol', compact('vols', 'isFirstReservation', 'fromOffer1'));
    }

    public function reserverVol(Request $request)
{
    $ville_depart = $request->input('ville_depart');
    $ville_arrivee = $request->input('ville_arrivee');

    $vols = Vol::where('ville_depart', 'LIKE', "%$ville_depart%")
                ->where('ville_arrivee', 'LIKE', "%$ville_arrivee%")
                ->get();

    $hasSearchResults = !$vols->isEmpty();

    if (!$hasSearchResults) {
        return redirect()->route('nonabonne.vols.index')->with('error', 'Aucun vol trouvé.');
    }

    $client = Auth::guard('client')->user();

    // Vérifier si c'est la première réservation du client
    $isFirstReservation = $client->reservations()->doesntExist();

    // Vérifier si le client a accédé à partir de l'offre 1
    $fromOffer1 = $request->input('offer') == 1;

    return view('client.nonabonne.reserver.reserver_vol', compact('vols', 'ville_depart', 'ville_arrivee', 'hasSearchResults', 'isFirstReservation', 'fromOffer1'));
}


    public function processReservation(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_naissance' => 'required|regex:/\d{2}\/\d{2}\/\d{4}/',
            'sexe' => 'required|in:Homme,Femme',
            'nationalite' => 'required|string|max:255',
            'num_identite' => 'nullable|string|max:255',
            'date_expiration_identite' => 'nullable|date',
            'pays_delivrance_identite' => 'nullable|string|max:255',
            'date_depart' => 'nullable|date',
            'date_retour' => 'nullable|date|after_or_equal:date_depart',
            'email' => 'required|email',
            'telephone' => 'required|string|max:20',
            'num_carte' => 'nullable|string|max:255',
            'date_expiration_carte' => 'nullable|date',
            'cvv' => 'nullable|string|max:10',
            'nom_titulaire_carte' => 'nullable|string|max:255',
            'ville_depart' => 'required|string|max:255',
            'ville_arrivee' => 'required|string|max:255',
            'vol_id' => 'required|exists:vols,id',
        ]);

        // Convertir la date de naissance au format YYYY-MM-DD
        $dateNaissanceParts = explode('/', $validatedData['date_naissance']);
        $validatedData['date_naissance'] = $dateNaissanceParts[2] . '-' . $dateNaissanceParts[1] . '-' . $dateNaissanceParts[0];

        $client = Auth::guard('client')->user();

        if (!$client) {
            abort(403, 'Action non autorisée.');
        }

        // Vérifier si c'est la première réservation de l'utilisateur
        $existingReservation = Reservation::where('client_id', $client->id)->first();
        $vol = Vol::find($validatedData['vol_id']);

        // Appliquer la réduction si c'est la première réservation
        if (!$existingReservation) {
            $validatedData['prix'] = $vol->prix * 0.90; // Exemple de réduction de 10%
        } else {
            $validatedData['prix'] = $vol->prix;
        }

        $validatedData['client_id'] = $client->id;
        $validatedData['status'] = 'en attente';

        $reservation = Reservation::create($validatedData);

        return redirect()->route('nonabonne.reservation.details', ['vol' => $validatedData['vol_id'], 'reservation' => $reservation->id])
                         ->with('success', 'Réservation effectuée avec succès.');
    }

    public function showReservationDetails($vol, $reservation)
    {
        // Utilisation de $vol et $reservation pour retrouver la réservation
        $reservation = Reservation::with('vol')->findOrFail($reservation);

        return view('client.nonabonne.reserver.confirmation_page', compact('reservation'));
    }

    public function showReservationForm(Vol $vol)
    {
        return view('client.nonabonne.reserver.reservation_form', compact('vol'));
    }

    public function suivreVols()
    {
        // Exemple de requête pour récupérer les vols à suivre
        $volsASuivre = Vol::where('statut', 'en cours') // Exemple de condition
                          ->orderBy('heure_depart', 'asc') // Exemple de tri par heure de départ
                          ->get();

        return view('client.nonabonne.suivre_vols', compact('volsASuivre'));
    }

    public function showOffer($id)
    {
        $offer = Offer::findOrFail($id);

        if ($offer->id === 1) {
            $vols = Vol::all();
            $client = Auth::guard('client')->user();
            $isFirstReservation = !$client->reservations()->exists();
            $percentage_discount = $offer->percentage_discount;

            return view('client.nonabonne.reserver.reserver_vol', compact('vols', 'isFirstReservation', 'percentage_discount'))->with('fromOffer1', true);
        }

        return view('client.nonabonne.offres.show', compact('offer'));
    }
}