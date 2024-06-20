<?php
namespace App\Http\Controllers\nonabonne;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vol;
use App\Models\Location;
use App\Models\Reservation;
use App\Models\Offer;
use App\Models\Hotel;

class nonabonneController extends Controller
{
    public function index()
    {
        return view('client.nonabonne.index');
    }

    public function sabonner()
    {
        return view('client.nonabonne.sabonner');
    }

   


    public function showAllVols()
    {
        $vols = Vol::all();
        return view('client.nonabonne.reserver.reserver_vol', compact('vols'));
    }


    public function historiqueVols()
    {
        $reservations = Reservation::all();
        return view('client.nonabonne.historique_vols', compact('reservations'));
    }


    public function suivreVols()
    {
        $volsASuivre = [];
        return view('client.nonabonne.suivre_vols', compact('volsASuivre'));
    }

    public function mesReservations()
    {
        // Logique pour récupérer les réservations de l'abonné
        $reservations = Reservation::where('user_id', auth()->id())->get();

        return view('client.nonabonne.mes_reservations', compact('reservations'));
    }

}
