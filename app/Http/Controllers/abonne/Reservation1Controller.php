<?php

namespace App\Http\Controllers\Abonne;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vol;
use App\Models\Reservation;

class Reservation1Controller extends Controller
{
    public function showReservationForm()
    {
        // Récupérer les lieux de départ et d'arrivée distincts à partir des vols disponibles
        $locations = Vol::select('ville_depart', 'ville_arrivee')->distinct()->get();
        
        // Récupérer toutes les réservations existantes
        $reservations = Reservation::all();

        // Retourner la vue avec les données des lieux de départ/arrivée et des réservations
        return view('client.abonne.reserver_vol', [
            'locations' => $locations,
            'reservations' => $reservations,
        ]);
    }

    public function processReservation(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'departure_location' => 'required',
            'arrival_location' => 'required',
            'departure_date' => 'required|date',
            // Ajoutez d'autres règles de validation selon vos besoins
        ]);

        // Créer une nouvelle réservation ou enregistrer dans la base de données
        $reservation = new Reservation();
        $reservation->departure_location = $request->departure_location;
        $reservation->arrival_location = $request->arrival_location;
        $reservation->departure_date = $request->departure_date;
        // Ajoutez d'autres champs de réservation selon votre modèle

        // Sauvegarder la réservation
        $reservation->save();

        // Redirection vers la route nommée 'reserver.vol' avec un message de succès et les données des réservations
        $reservations = Reservation::all(); // Récupérer à nouveau toutes les réservations
        return redirect()->route('abonne.reserver.vol')->with([
            'success' => 'Réservation effectuée avec succès!',
            'reservations' => $reservations,
        ]);
    }
}
