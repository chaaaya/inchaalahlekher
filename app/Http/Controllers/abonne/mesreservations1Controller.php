<?php

namespace App\Http\Controllers\abonne;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;

class MesReservations1Controller extends Controller
{
    // Méthode pour afficher les réservations
    public function index()
    {
        $client = Auth::guard('client')->user();
        if (!$client) {
            abort(404, 'Client not found');
        }
        $reservations = $client->reservations;
        return view('client.abonne.mes_reservations.index', compact('reservations'));
    }

    // Méthode pour afficher le formulaire de modification
    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('client.abonne.mes_reservations.edit', compact('reservation'));
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

        return redirect()->route('abonne.mes.reservations')->with('success', 'Réservation mise à jour avec succès.');
    }

    // Méthode pour supprimer une réservation
    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        return redirect()->route('abonne.mes.reservations')->with('success', 'Réservation supprimée avec succès.');
    }
}
