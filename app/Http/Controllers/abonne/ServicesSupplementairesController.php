<?php

namespace App\Http\Controllers\Abonne;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServicesSupplementairesController extends Controller
{
    public function index()
    {
        // Ici, vous pouvez ajouter la logique nécessaire pour récupérer des données ou traiter des actions pour la page des services supplémentaires
        return view('client.abonne.services_supplementaires');
    }
}
