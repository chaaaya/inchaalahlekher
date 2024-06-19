<?php

namespace App\Http\Controllers\Abonne;

use App\Http\Controllers\Controller;
use App\Models\Reservation;

class HistoriqueVolController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return view('client.abonne.historique_vols', compact('reservations'));
    }
}
