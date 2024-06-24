<?php

namespace App\Http\Controllers\abonne;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vol;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class ReserverController extends Controller
{
    public function showAvailableFlights(Request $request)
    {
        $vols = Vol::query();

        // Filtrer par ville de départ si spécifié dans la requête
        if ($request->filled('ville_depart')) {
            $vols->where('ville_depart', $request->ville_depart);
        }

        // Filtrer par ville d'arrivée si spécifié dans la requête
        if ($request->filled('ville_arrivee')) {
            $vols->where('ville_arrivee', $request->ville_arrivee);
        }

        $vols = $vols->get();

        $hasSearchResults = $request->filled('ville_depart') || $request->filled('ville_arrivee');

        return view('client.abonne.reserver.reserver_vol', compact('vols', 'hasSearchResults'));
    }

    public function showReservationForm(Vol $vol)
    {
        return view('client.abonne.reserver.reservation_form', compact('vol'));
    }

    public function processReservation(Request $request)
    {
        $validatedData = $request->validate([
            // Valider les données de réservation ici
        ]);

        // Convertir la date de naissance au format YYYY-MM-DD
        $dateNaissanceParts = explode('/', $validatedData['date_naissance']);
        $validatedData['date_naissance'] = $dateNaissanceParts[2] . '-' . $dateNaissanceParts[1] . '-' . $dateNaissanceParts[0];

        // Récupérer l'utilisateur abonné connecté
        $abonne = Auth::guard('abonne')->user();

        if (!$abonne) {
            abort(403, 'Action non autorisée.');
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
}
