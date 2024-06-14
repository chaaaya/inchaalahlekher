<?php

namespace App\Http\Controllers\Abonne;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Location;
use Illuminate\Http\Request;

class ServicesSupplementairesController extends Controller
{
    public function index()
    {
        $hotels = Hotel::all(); // Récupère tous les hôtels
        $locations = Location::all(); // Récupère toutes les locations

        return view('client.abonne.services_supplementaires', compact('hotels', 'locations'));
    }
}
