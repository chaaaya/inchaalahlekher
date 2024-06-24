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
