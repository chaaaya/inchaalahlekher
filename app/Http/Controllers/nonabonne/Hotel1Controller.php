<?php
// app/Http/Controllers/Abonne/HotelController.php

namespace App\Http\Controllers\nonAbonne;

use App\Http\Controllers\Controller;
use App\Models\Hotel; // Inclure le modèle Hotel
use Illuminate\Http\Request;

class Hotel1Controller extends Controller
{
    public function index()
    {
        // Récupérer tous les hôtels depuis la base de données
        $hotels = Hotel::all();

        // Retourner la vue avec les données des hôtels
        return view('client.nonabonne.services.hotels', compact('hotels'));
    }
}
