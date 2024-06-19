<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return view('admin.reservation.manage-reservations', compact('reservations'));
    }

    public function create()
    {
        return view('admin.reservation.create'); // Assurez-vous que votre vue existe à ce chemin
    }

    public function store(Request $request)
    {
        // Validation des données de formulaire
        $request->validate([
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
            'telephone' => 'required|string|max:20',
            'num_carte' => 'nullable|string|max:255',
            'date_expiration_carte' => 'nullable|date',
            'cvv' => 'nullable|string|max:10',
            'nom_titulaire_carte' => 'nullable|string|max:255',
            'ville_depart' => 'required|string|max:255',
            'ville_arrivee' => 'required|string|max:255',
            'client_id' => 'required|exists:clients,id', // Vérifie que client_id existe dans la table clients
            'status' => 'required|in:en attente,acceptée,refusée',
        ]);

        // Création d'une nouvelle instance de réservation avec les données validées
        $reservation = new Reservation([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'date_naissance' => $request->date_naissance,
            'sexe' => $request->sexe,
            'nationalite' => $request->nationalite,
            'num_identite' => $request->num_identite,
            'date_expiration_identite' => $request->date_expiration_identite,
            'pays_delivrance_identite' => $request->pays_delivrance_identite,
            'date_depart' => $request->date_depart,
            'date_retour' => $request->date_retour,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'num_carte' => $request->num_carte,
            'date_expiration_carte' => $request->date_expiration_carte,
            'cvv' => $request->cvv,
            'nom_titulaire_carte' => $request->nom_titulaire_carte,
            'ville_depart' => $request->ville_depart,
            'ville_arrivee' => $request->ville_arrivee,
            'client_id' => $request->client_id,
            'status' => $request->status,
        ]);

        // Sauvegarde de la réservation dans la base de données
        $reservation->save();

        // Redirection avec un message de succès
        return redirect()->route('admin.reservation.index')->with('success', 'La réservation a été créée avec succès.');
    }

    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('admin.reservation.edit', compact('reservation'));
    }

    public function update(Request $request, $id)
    {
        // Validation des données de formulaire
        $validatedData = $request->validate([
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
            'telephone' => 'required|string|max:20',
            'num_carte' => 'nullable|string|max:255',
            'date_expiration_carte' => 'nullable|date',
            'cvv' => 'nullable|string|max:10',
            'nom_titulaire_carte' => 'nullable|string|max:255',
            'ville_depart' => 'required|string|max:255',
            'ville_arrivee' => 'required|string|max:255',
            'client_id' => 'required|exists:clients,id', // Vérifie que client_id existe dans la table clients
            'status' => 'required|in:en attente,acceptée,refusée',
        ]);

        // Récupération de la réservation à mettre à jour
        $reservation = Reservation::findOrFail($id);

        // Mise à jour des attributs de la réservation
        $reservation->fill($validatedData);
        $reservation->save();

        // Redirection avec un message de succès
        return redirect()->route('admin.reservation.index')->with('success', 'Réservation mise à jour avec succès.');
    }

    public function accept($id)
    {
        // Changement du statut de la réservation à "acceptée"
        $reservation = Reservation::findOrFail($id);
        $reservation->status = 'acceptée';
        $reservation->save();

        // Redirection avec un message de succès
        return redirect()->route('admin.reservation.index')->with('success', 'Réservation acceptée avec succès.');
    }

    public function reject($id)
    {
        // Changement du statut de la réservation à "refusée"
        $reservation = Reservation::findOrFail($id);
        $reservation->status = 'refusée';
        $reservation->save();

        // Redirection avec un message de succès
        return redirect()->route('admin.reservation.index')->with('success', 'Réservation refusée avec succès.');
    }

    public function destroy($id)
    {
        // Suppression de la réservation
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        // Redirection avec un message de succès
        return redirect()->route('admin.reservation.index')->with('success', 'Réservation supprimée avec succès.');
    }
}
