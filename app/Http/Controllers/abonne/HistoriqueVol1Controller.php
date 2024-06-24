<?php

namespace App\Http\Controllers\Abonne;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class HistoriqueVol1Controller extends Controller
{
    public function historiqueVols()
    {
        $reservations = Reservation::all();
        return view('client.abonne.historique_vols', compact('reservations'));
    }
}
