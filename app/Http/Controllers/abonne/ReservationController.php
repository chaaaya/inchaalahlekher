<?php

namespace App\Http\Controllers;

use App\Models\Vol;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function showReservationForm()
    {
        $locations = Vol::select('ville_depart', 'ville_arrivee')->distinct()->get();
        return view('reserver_vol', ['locations' => $locations]);
    }
}
