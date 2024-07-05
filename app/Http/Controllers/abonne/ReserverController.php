<?php
namespace App\Http\Controllers\abonne;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vol;
use App\Models\Offer;
use App\Models\Reservation;
use App\Models\Client;
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
            'vol_id' => 'required|exists:vols,id',
            'email' => 'required|email',
            'telephone' => 'required|string|max:20',
            'sexe' => 'required|in:Homme,Femme',
            'nationalite' => 'required|string|max:255',
            'num_identite' => 'nullable|string|max:255',
            'date_expiration_identite' => 'nullable|date',
            'pays_delivrance_identite' => 'nullable|string|max:255',
            'tarif_calculé' => 'required|numeric',
            'type_bagage' => 'required|string',
            'nombre_bagages' => 'required|integer',
            'poids_bagage' => 'required|numeric',
            'longueur_bagage' => 'required|numeric',
            'largeur_bagage' => 'required|numeric',
            'hauteur_bagage' => 'required|numeric',
            'contenu_bagage' => 'nullable|string',
            'equipement_sportif' => 'nullable|boolean',
            'instrument_musique' => 'nullable|boolean',
            'num_carte' => 'required|string|max:20',
            'date_expiration_carte' => 'required|date',
            'cvv' => 'required|string|max:4',
            'nom_titulaire_carte' => 'required|string|max:255',
        ]);
    
        $clientId = Auth::guard('client')->id();
        $client = Client::find($clientId);

        if (!$client) {
            return redirect()->back()->with('error', 'Client non trouvé');
        }
    $reservation = new Reservation();
    $reservation->vol_id = $validatedData['vol_id'];
    $reservation->client_id = $client->id;
    $reservation->nom = $validatedData['nom']; // add this line
    $reservation->prenom = $validatedData['prenom']; // add this line
    $reservation->date_naissance = $validatedData['date_naissance']; // add this line
    $reservation->email = $validatedData['email'];
    $reservation->telephone = $validatedData['telephone'];
    $reservation->sexe = $validatedData['sexe'];
    $reservation->nationalite = $validatedData['nationalite'];
    $reservation->num_identite = $validatedData['num_identite'];
    $reservation->date_expiration_identite = $validatedData['date_expiration_identite'];
    $reservation->pays_delivrance_identite = $validatedData['pays_delivrance_identite'];
    $reservation->tarif = $validatedData['tarif_calculé'];
    $reservation->num_carte = $validatedData['num_carte'];
    $reservation->date_expiration_carte = $validatedData['date_expiration_carte'];
    $reservation->cvv = $validatedData['cvv'];
    $reservation->nom_titulaire_carte = $validatedData['nom_titulaire_carte'];
    $reservation->status = 'en attente';
    $reservation->save();

    return redirect()->route('abonne.reservation.details', [
        'vol' => $validatedData['vol_id'],
        'reservation' => $reservation->id
    ])->with('success', 'Réservation effectuée avec succès.');
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