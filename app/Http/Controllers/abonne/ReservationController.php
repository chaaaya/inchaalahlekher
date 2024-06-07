<?php

namespace App\Http\Controllers;

use App\Models\Vol;
use Illuminate\Http\Request;
use App\Models\Reservation; 
class ReservationController extends Controller
{
    public function index()
{
    $reservations = Reservation::all(); // Assurez-vous d'utiliser le bon modèle pour les réservations
    return view('admin.reservation.manage-reservations', compact('reservations'));
}

    public function showReservationForm()
    {
        $locations = Vol::select('ville_depart', 'ville_arrivee')->distinct()->get();
        return view('reserver_vol', ['locations' => $locations]);
    }
    public function create()
{
    return view('admin.reservation.create'); // Assurez-vous que votre vue existe à cet emplacement
}

}
