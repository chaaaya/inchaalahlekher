<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;  // Ou les modèles nécessaires
use App\Models\Reservation;
use App\Models\Offer;
use App\Models\Service;
use App\Models\Vol;
use App\Models\Rapport;

class Admin1Controller extends Controller
{
    // Gestion des utilisateurs
    public function usersManagement()
    {
        $users = User::all();  // Récupère tous les utilisateurs
        return view('admin.manage-users', compact('users'));
    }

    // Gestion des réservations
    public function reservationsManagement()
    {
        $reservations = Reservation::all();  // Récupère toutes les réservations
        return view('admin.reservation.manage-reservations', compact('reservations'));
    }

    // Gestion des offres
    public function offersManagement()
    {
        $offers = Offer::all();  // Récupère toutes les offres
        return view('admin.manage-offers', compact('offers'));
    }

    // Gestion des services
    public function servicesManagement()
    {
        $services = Service::all();  // Récupère tous les services
        return view('admin.manage-services', compact('services'));
    }

    // Gestion des vols
    public function volsManagement()
    {
        $vols = Vol::all();  // Récupère tous les vols
        return view('admin.manage-vols', compact('vols'));
    }

    // Gestion des rapports
    public function rapportsManagement()
    {
        $rapports = Rapport::all();  // Récupère tous les rapports
        return view('admin.manage-rapports', compact('rapports'));
    }
}
