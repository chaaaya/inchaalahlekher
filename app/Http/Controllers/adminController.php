<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function usersManagement()
    {
        return view('admin.manage-users');
    }

    public function reservationsManagement()
    {
        return view('admin.reservation.manage-reservations');
    }

    public function offersManagement()
    {
        return view('admin.manage-offers');
    }

    public function servicesManagement()
    {
        return view('admin.manage-services');
    }

    public function volsManagement()
    {
        return view('admin.manage-vols');
    }

   
    public function rapportsManagement()
    {
        // Logique pour récupérer et manipuler les rapports
        $rapports = []; // Remplacez ceci par la logique pour récupérer les rapports depuis votre modèle

        return view('admin.manage-rapports', compact('rapports'));
    }
}