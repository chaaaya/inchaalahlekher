<?php

namespace App\Http\Controllers\Abonne;

use App\Http\Controllers\Controller;
use App\Models\Vol;
use Illuminate\Http\Request;
use App\Models\Reservation;
class AbonneController extends Controller
{
    public function index()
    {
        return view('client.abonne.index');
    }

    public function servicesSupplementaires()
{
    return view('client.abonne.services_supplementaires');
}


    public function __construct()
    {
        $this->middleware(['auth:client']);
    }

    public function reserverVol()
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

    public function historiqueVols()
    {
        return view('client.abonne.historique_vols');
    }

    public function consulterOffres()
    {
        return view('client.abonne.offres');
    }

    public function suivreVols()
    {
        $volsASuivre = Vol::where('status', 'en cours')->get();
        return view('client.abonne.suivre_vols', compact('volsASuivre'));
    }

    public function sAbonner()
    {
        return view('client.abonne.sabonner');
    }

    public function processAbonnement(Request $request)
    {
        // Logique pour traiter l'abonnement
        // Par exemple, enregistrer l'abonnement dans la base de données

        return redirect()->route('abonne.index')->with('success', 'Abonnement effectué avec succès!');
    }
}
