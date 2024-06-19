<?php
namespace App\Http\Controllers\Abonne;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vol;
use App\Models\Location;
use App\Models\Reservation;
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

   


    public function showAllVols()
    {
        $vols = Vol::all();
        return view('client.abonne.reserver.reserver_vol', compact('vols'));
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

    public function mesReservations()
    {
        // Logique pour récupérer les réservations de l'abonné
        $reservations = Reservation::where('user_id', auth()->id())->get();

        return view('client.abonne.mes_reservations', compact('reservations'));
    }

}
