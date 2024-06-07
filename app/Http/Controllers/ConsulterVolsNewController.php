<?php

namespace App\Http\Controllers;

use App\Models\Vol;
use Illuminate\Http\Request;

class ConsulterVolsNewController extends Controller
{
    public function index()
    {
        $vols = Vol::all();
        return view('consulter-vols', compact('vols'));
    }

    public function search(Request $request)
    {
        // Récupérer les entrées de recherche depuis le formulaire
        $ville_depart = $request->input('ville_depart');
        $ville_arrivee = $request->input('ville_arrivee');

        // Effectuer la recherche basée sur les villes de départ et d'arrivée
        $vols = Vol::where('ville_depart', 'LIKE', "%$ville_depart%")
                    ->where('ville_arrivee', 'LIKE', "%$ville_arrivee%")
                    ->get();

        // Passer les résultats à la vue
        return view('consulter-vols', compact('vols'));
    }
}
