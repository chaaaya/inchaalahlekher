<?php

namespace App\Http\Controllers\Abonne;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hotel;
class hotel11Controller extends Controller
{
    public function index()
    {
        // Récupérer tous les hôtels depuis la base de données
        $hotels = Hotel::all();

        // Retourner la vue avec les données des hôtels
        return view('client.abonne.services.hotels', compact('hotels'));
    }
}
