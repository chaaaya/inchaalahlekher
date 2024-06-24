<?php

namespace App\Http\Controllers\Abonne;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vol; // Assurez-vous d'importer le modèle Vol

class SuivreVol1Controller extends Controller
{
    public function index()
    {
        // Récupérer les vols à suivre (exemple avec des données factices)
        $volsASuivre = Vol::all(); // Remplacez cette ligne par votre logique métier

        return view('client.abonne.suivre_vols', compact('volsASuivre'));
    }
}
