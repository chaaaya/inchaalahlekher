<?php

namespace App\Http\Controllers\abonne;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vol;
use App\Models\Offer;

class AbonneController extends Controller
{
    public function index()
    {
        return view('client.abonne.index');
    }

    public function reserverVol()
    {
        $locations = Vol::select('ville_depart', 'ville_arrivee')->distinct()->get();
        return view('client.abonne.reserver_vol', ['locations' => $locations]);
    }

    public function processReservation(Request $request)
    {
        // Logique de traitement de la réservation ici
        // Par exemple, enregistrer les données dans la base de données
        // Redirection ou affichage d'une vue de confirmation

        return redirect()->route('abonne.reserver.vol')->with('success', 'Réservation effectuée avec succès!');
    }

    public function historiqueVols()
    {
        // Si vous ne souhaitez pas filtrer par client_id, récupérez simplement tous les vols
        $vols = Vol::all();
        return view('client.abonne.historique_vols', ['vols' => $vols]);
    }

    public function servicesSupplementaires()
    {
        return view('client.abonne.services_supplementaires');
    }

    public function consulterOffres()
    {
        $offers = Offer::all();
        return view('client.abonne.offres', ['offers' => $offers]);
    }

    public function suivreVols()
    {
        $vols = Vol::all();
        return view('client.abonne.suivre_vols', ['vols' => $vols]);
    }

    public function __construct()
    {
        $this->middleware('auth:client');
    }
}
