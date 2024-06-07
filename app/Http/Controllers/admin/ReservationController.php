<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return view('admin.reservation.manage-reservations', compact('reservations'));
    }

    public function create()
    {
        return view('admin.reservation.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_passager' => 'required|string|max:255',
            'email_passager' => 'required|email|max:255',
            'numero_billet' => 'required|string|max:255',
            'date_reservation' => 'required|date',
        ]);

        Reservation::create($request->all());

        return redirect()->route('admin.reservation.manage-reservations')
                         ->with('success', 'Réservation créée avec succès.');
    }

    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('admin.reservation.edit', compact('reservation'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom_passager' => 'required|string|max:255',
            'email_passager' => 'required|email|max:255',
            'numero_billet' => 'required|string|max:255',
            'date_reservation' => 'required|date',
        ]);

        $reservation = Reservation::findOrFail($id);
        $reservation->update($request->all());

        return redirect()->route('admin.reservation.manage-reservations')
                         ->with('success', 'Réservation mise à jour avec succès.');
    }

    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        return redirect()->route('admin.reservation.manage-reservations')
                         ->with('success', 'Réservation supprimée avec succès.');
    }
}
?>
