<?php
namespace App\Http\Controllers\abonne;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vol;
use App\Models\Offer;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
    // Validation des données du formulaire
    $validatedData = $request->validate([
        'vol_id' => 'required|exists:vols,id',
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'date_naissance' => 'required|date',
        'sexe' => 'required|in:Homme,Femme',
        'nationalite' => 'required|string|max:255',
        'num_identite' => 'nullable|string|max:255',
        'date_expiration_identite' => 'nullable|date',
        'pays_delivrance_identite' => 'nullable|string|max:255',
        'date_depart' => 'required|date',
        'date_retour' => 'required|date',
        'email' => 'required|email|max:255',
        'telephone' => 'required|string|max:255',
        'num_carte' => 'required|string|max:255',
        'date_expiration_carte' => 'required|date',
        'cvv' => 'required|string|max:255',
        'nom_titulaire_carte' => 'required|string|max:255',
        'ville_depart' => 'required|string|max:255',
        'ville_arrivee' => 'required|string|max:255',
        'tarif_calcule' => 'required|numeric',
    ]);

    // Récupération de l'utilisateur authentifié
    $client = Auth::guard('client')->user();

    // Création d'une nouvelle réservation avec les données validées
    $reservation = Reservation::create([
        'vol_id' => $validatedData['vol_id'],
        'nom' => $validatedData['nom'],
        'prenom' => $validatedData['prenom'],
        'date_naissance' => $validatedData['date_naissance'],
        'sexe' => $validatedData['sexe'],
        'nationalite' => $validatedData['nationalite'],
        'num_identite' => $validatedData['num_identite'],
        'date_expiration_identite' => $validatedData['date_expiration_identite'],
        'pays_delivrance_identite' => $validatedData['pays_delivrance_identite'],
        'date_depart' => $validatedData['date_depart'],
        'date_retour' => $validatedData['date_retour'],
        'email' => $validatedData['email'],
        'telephone' => $validatedData['telephone'],
        'num_carte' => $validatedData['num_carte'],
        'date_expiration_carte' => $validatedData['date_expiration_carte'],
        'cvv' => $validatedData['cvv'],
        'nom_titulaire_carte' => $validatedData['nom_titulaire_carte'],
        'ville_depart' => $validatedData['ville_depart'],
        'ville_arrivee' => $validatedData['ville_arrivee'],
        'client_id' => $client->id,
        'status' => 'en attente',
        'tarif_calcule' => $validatedData['tarif_calcule'],
    ]);

    // Redirection vers une page de confirmation avec un message de succès
    return redirect()->route('abonne.reservation.confirmation', [
        'reservation' => $reservation->id
    ])->with('success', 'Réservation effectuée avec succès.');
}
public function showConfirmationPage()
{
    return view('client.abonne.reserver.confirmation_page');
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
