<?php
namespace App\Http\Controllers\abonne;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;

class CheckInController extends Controller
{
    public function showCheckInForm()
    {
        return view('client.abonne.checkin.checkin_form');
    }

    public function processCheckIn(Request $request)
    {
        // Valider les données de la requête
        $validatedData = $request->validate([
            'reservation_id' => 'required|exists:reservations,id',
            'email' => 'required|email|exists:reservations,email',
        ]);

        // Vérifier la réservation
        $reservation = Reservation::where('id', $validatedData['reservation_id'])
                                  ->where('email', $validatedData['email'])
                                  ->first();

        if ($reservation) {
            // Marquer la réservation comme check-in effectué
            $reservation->checkin_done = true;
            $reservation->save();

            // Rediriger vers une page de succès
            return redirect()->route('abonne.checkin.success');
        }

        // Si la réservation n'est pas trouvée, retourner une erreur
        return back()->withErrors(['message' => 'Réservation non trouvée ou informations incorrectes.']);
    }

    public function showCheckInSuccess()
    {
        return view('client.abonne.checkin_success');
    }
}