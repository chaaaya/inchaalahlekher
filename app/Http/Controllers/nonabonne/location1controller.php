<?php

namespace App\Http\Controllers\nonabonne;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location; // Assurez-vous d'importer le modèle Location

class location1controller extends Controller
{
    public function showLocations() {
        $locations = Location::all(); // Récupère toutes les locations de voiture

        return view('client.nonabonne.services.locations', [
            'locations' => $locations
        ]);
    }
}
