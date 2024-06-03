<?php 
namespace App\Http\Controllers\Abonne;
use App\Models\Location;
use App\Models\Reservation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AbonneController extends Controller
{
    public function index()
    {
        return view('abonne.index');
    }

    public function sabonner()
    {
        // Logique pour la page de s'abonner
        return view('abonne.sabonner');
    }

    public function servicesSupplementaires()
    {
        // Logique pour la page des services supplémentaires
        return view('abonne.services_supplementaires');
    }
    public function reserverVol()
    {
        $locations = Location::all();
        return view('abonne.reserver_vol', compact('locations'));
    }
    

    public function historiqueVols()
    {
        // Logique pour la page d'historique des vols
        return view('abonne.historique_vols');
    }

    public function consulterOffres()
    {
        // Logique pour la page de consultation des offres
        return view('abonne.consulter_offres');
    }
    public function suivreVols()
    {
        // Logique pour récupérer les vols à suivre
        $volsASuivre = []; // Exemple : à remplacer par la logique appropriée

        return view('abonne.suivre_vols', compact('volsASuivre'));
    }
    // app/Http/Controllers/Abonne/AbonneController.php
    public function processReservation(Request $request)
    {
        $request->validate([
            'departure_location' => 'required|exists:locations,id',
            'arrival_location' => 'required|exists:locations,id',
            'departure_date' => 'required|date',
        ]);

        Reservation::create([
            'departure_location_id' => $request->departure_location,
            'arrival_location_id' => $request->arrival_location,
            'departure_date' => $request->departure_date,
        ]);

        return redirect()->route('abonne.index')->with('success', 'Réservation effectuée avec succès!');
    }

}
