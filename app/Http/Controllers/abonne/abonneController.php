<?php
namespace App\Http\Controllers\Abonne;

use App\Models\Location;
use App\Models\Reservation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\Hotel;

class AbonneController extends Controller
{
    public function index()
    {
        return view('client.abonne.index');
    }

    public function sabonner()
    {
        return view('client.abonne.sabonner');
    }
    public function servicesSupplementaires()
    {
        $hotels = Hotel::all();
        $locations = Location::all();
        
        return view('client.abonne.services_supplementaires', compact('hotels', 'locations'));
    }
    
    

    public function reserverVol()
    {
        $locations = Location::all();
        return view('client.abonne.reserver_vol', compact('locations'));
    }

    public function historiqueVols()
    {
        $reservations = Reservation::all();
        return view('client.abonne.historique_vols', compact('reservations'));
    }

    public function consulterOffres()
    {
        $offres = Offer::all();
        return view('client.abonne.offres', compact('offres'));
    }

    public function suivreVols()
    {
        $volsASuivre = [];
        return view('client.abonne.suivre_vols', compact('volsASuivre'));
    }
    public function processReservation(Request $request)
    {
        $request->validate([
            'type' => 'required|in:hotel,location',
            'hotel_id' => 'required_if:type,hotel|exists:hotels,id',
            'location_id' => 'required_if:type,location|exists:locations,id',
            'departure_date' => 'required|date',
        ]);
    
        if ($request->type == 'hotel') {
            // Logique pour réserver un hôtel
            $reservation = new Reservation([
                'hotel_id' => $request->hotel_id,
                'departure_date' => $request->departure_date,
            ]);
        } elseif ($request->type == 'location') {
            // Logique pour réserver une location
            $reservation = new Reservation([
                'location_id' => $request->location_id,
                'departure_date' => $request->departure_date,
            ]);
        }
    
        $reservation->save();
    
        return redirect()->route('abonne.services.supplementaires')->with('success', 'Réservation effectuée avec succès!');
    }
    
}
