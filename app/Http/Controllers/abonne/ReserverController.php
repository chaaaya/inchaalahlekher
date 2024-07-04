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
        // Validate the request data
        $validatedData = $request->validate([
            'email' => 'required|email',
            'telephone' => 'required',
            'sexe' => 'required',
            'nationalite' => 'required',
            'num_identite' => 'required',
            'date_expiration_identite' => 'required',
            'pays_delivrance_identite' => 'required',
            'tarif_calculé' => 'required',
            'num_carte' => 'required',
            'date_expiration_carte' => 'required',
            'cvv' => 'required',
            'nom_titulaire_carte' => 'required',
        ]);
    
        // Create a new reservation instance
        $reservation = new Reservation();
        $reservation->vol_id = $request->input('vol_id');
        $reservation->email = $validatedData['email'];
        $reservation->telephone = $validatedData['telephone'];
        $reservation->sexe = $validatedData['sexe'];
        $reservation->nationalite = $validatedData['nationalite'];
        $reservation->num_identite = $validatedData['num_identite'];
        $reservation->date_expiration_identite = $validatedData['date_expiration_identite'];
        $reservation->pays_delivrance_identite = $validatedData['pays_delivrance_identite'];
        $reservation->tarif_calculé = $validatedData['tarif_calculé'];
        $reservation->num_carte = $validatedData['num_carte'];
        $reservation->date_expiration_carte = $validatedData['date_expiration_carte'];
        $reservation->cvv = $validatedData['cvv'];
        $reservation->nom_titulaire_carte = $validatedData['nom_titulaire_carte'];
        $reservation->client_id = Auth::guard('client')->id(); // Set the client_id field to the current client's ID
    
        // Save the reservation to the database
        $reservation->save();
    
        // Redirect to a success page
        return redirect()->route('reservation.success');
    }
    
    public function showReservationDetails($vol, $reservation)
    {
        $reservation = Reservation::with('vol')->findOrFail($reservation);

        return view('client.abonne.reserver.confirmation_page', compact('reservation'));
    }
}