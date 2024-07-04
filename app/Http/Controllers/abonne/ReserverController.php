<?php
namespace App\Http\Controllers\abonne;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vol;
use App\Models\Offer;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class ReserverController extends Controller
{
    public function showAvailableFlights(Request $request)
    {
        $vols = Vol::query();

        if ($request->filled('ville_depart')) {
            $vols->where('ville_depart', $request->ville_depart);
        }

        if ($request->filled('ville_arrivee')) {
            $vols->where('ville_arrivee', $request->ville_arrivee);
        }

        $vols = $vols->get();

        $hasSearchResults = $request->filled('ville_depart') || $request->filled('ville_arrivee');

        $fromOffer1 = $request->input('fromOffer1', false);
        $percentage_discount = 0;
        $isFirstReservation = false;

        if ($fromOffer1) {
            $abonne = Auth::guard('client')->user();
            $isFirstReservation = !$abonne->reservations()->exists();
            $percentage_discount = Offer::find(1)->percentage_discount; // Assurez-vous que l'offre avec id 1 existe
        }

        return view('client.abonne.reserver.reserver_vol', compact('vols', 'hasSearchResults', 'fromOffer1', 'percentage_discount', 'isFirstReservation'));
    }

    public function showReservationForm(Vol $vol)
    {
        return view('client.abonne.reserver.reservation_form', compact('vol'));
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

        // Récupérer l'utilisateur abonné connecté
        $abonne = Auth::guard('abonne')->user();

        if (!$abonne) {
            abort(403, 'Action non autorisée.');
        }

        // Vérifier si c'est la première réservation de l'utilisateur
        $existingReservation = Reservation::where('abonne_id', $abonne->id)->first();
        $vol = Vol::find($validatedData['vol_id']);

        // Appliquer la réduction si c'est la première réservation et si l'utilisateur vient de l'offre 1
        if ($request->input('fromOffer1', false) && !$existingReservation) {
            $percentage_discount = Offer::find(1)->percentage_discount; // Assurez-vous que l'offre avec id 1 existe
            $validatedData['prix'] = $vol->prix * (1 - ($percentage_discount / 100));
        } else {
            $validatedData['prix'] = $vol->prix;
        }

        $validatedData['abonne_id'] = $abonne->id;
        $validatedData['status'] = 'en attente';

        $reservation = Reservation::create($validatedData);

        return redirect()->route('abonne.reservation.details', ['vol' => $validatedData['vol_id'], 'reservation' => $reservation->id])
                         ->with('success', 'Réservation effectuée avec succès.');
    }

    public function showReservationDetails($vol, $reservation)
    {
        $reservation = Reservation::with('vol')->findOrFail($reservation);

        return view('client.abonne.reserver.confirmation_page', compact('reservation'));
    }

    public function showOffer($id)
    {
        $offer = Offer::findOrFail($id);

        if ($offer->id === 1) {
            return redirect()->route('abonne.reserver.vol', ['fromOffer1' => true]);
        }

        return view('client.abonne.offres.show', compact('offer'));
    }

    public function suivreVols()
    {
        // Exemple de requête pour récupérer les vols à suivre
        $volsASuivre = Vol::where('statut', 'en cours') // Exemple de condition
                          ->orderBy('heure_depart', 'asc') // Exemple de tri par heure de départ
                          ->get();

        return view('client.abonne.suivre_vols', compact('volsASuivre'));
    }
}