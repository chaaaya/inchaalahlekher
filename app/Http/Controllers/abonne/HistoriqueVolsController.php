<?php
// app/Http/Controllers/Abonne/HistoriqueVolsController.php

namespace App\Http\Controllers\Abonne;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class HistoriqueVolsController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with('vol')->get();
        return view('abonne.historique_vols', compact('reservations'));
    }
}
