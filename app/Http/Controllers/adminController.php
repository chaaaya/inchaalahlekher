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
        return view('admin.manage-reservation');
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
        return view('admin.manage-rapports');
    }
}