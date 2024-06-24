<?php

namespace App\Http\Controllers\Abonne;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\location;
class locationController extends Controller
{
    public function showLocations() {
        $locations = Location::all(); // Récupère toutes les locations de voiture

        return view('client.abonne.services.locations', [
            'locations' => $locations
        ]);
    }
}
