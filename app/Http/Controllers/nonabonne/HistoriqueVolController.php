<?php

namespace App\Http\Controllers\nonabonne;

use App\Http\Controllers\Controller;
use App\Models\Reservation;

class HistoriqueVolController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return view('client.nonabonne.historique_vols', compact('reservations'));
    }
}
