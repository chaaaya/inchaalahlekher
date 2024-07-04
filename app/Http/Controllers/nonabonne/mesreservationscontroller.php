<?php
namespace App\Http\Controllers\nonabonne;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
use App\Models\vol; // Assurez-vous d'importer le modèle vol

class MesReservationsController extends Controller
{
    // Méthode pour afficher les réservations
    public function index()
    {
        $client = Auth::guard('client')->user();
        if (!$client) {
            abort(404, 'Client not found');
        }
        $reservations = $client->reservations;
        return view('client.nonabonne.mes_reservations.index', compact('reservations'));
    }

    // Méthode pour afficher le formulaire de modification
    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('client.nonabonne.mes_reservations.edit', compact('reservation'));
    }

    // Méthode pour mettre à jour la réservation
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'sexe' => 'required|in:Homme,Femme',
            'nationalite' => 'required|string|max:255',
            'num_identite' => 'required|string|max:255',
            'date_expiration_identite' => 'required|date',
            'pays_delivrance_identite' => 'required|string|max:255',
            'date_depart' => 'required|date',
            'date_retour' => 'nullable|date|after_or_equal:date_depart',
            'email' => 'required|email',
            'telephone' => 'required|string|max:20',
            'num_carte' => 'required|string|max:255',
            'date_expiration_carte' => 'required|date',
            'cvv' => 'required|string|max:10',
            'nom_titulaire_carte' => 'required|string|max:255',
            'ville_depart' => 'required|string|max:255',
            'ville_arrivee' => 'required|string|max:255',
        ]);

        $reservation = Reservation::findOrFail($id);
        $reservation->fill($validatedData);
        $reservation->save();

        return redirect()->route('nonabonne.mes.reservations')->with('success', 'Réservation mise à jour avec succès.');
    }

    // Méthode pour supprimer une réservation
    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        return redirect()->route('nonabonne.mes.reservations')->with('success', 'Réservation supprimée avec succès.');
    }

    // Méthode pour afficher la confirmation de réservation
    public function showConfirmation()
    {
        return view('client.nonabonne.mes_reservations.confirmation');
    }

    // Méthode pour réserver un vol
    public function reserver(Request $request, $volId)
    {
        $client = Auth::guard('client')->user();
        if (!$client) {
            abort(404, 'Client not found');
        }

        $vol = vol::findOrFail($volId);

        // Vérifier si l'utilisateur a déjà réservé un vol
        $existingReservation = Reservation::where('user_id', $client->id)->first();

        // Appliquer la réduction si c'est la première réservation
        $discountedPrice = $vol->price;
        if (!$existingReservation) {
            $discountedPrice *= 0.90; // Exemple de réduction de 10%
        }

        // Créer une nouvelle réservation
        $reservation = new Reservation();
        $reservation->user_id = $client->id;
        $reservation->vol_id = $vol->id;
        $reservation->price = $discountedPrice;
        $reservation->save();

        return redirect()->route('nonabonne.mes.reservations')->with('success', 'Réservation effectuée avec succès.');
    }
}