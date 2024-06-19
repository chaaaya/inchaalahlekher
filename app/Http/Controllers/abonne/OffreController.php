<?php

namespace App\Http\Controllers\Abonne;

use App\Http\Controllers\Controller;
use App\Models\Offer;

class OffreController extends Controller
{
    public function index()
    {
        $offres = Offer::all();
        return view('client.abonne.offres', compact('offres'));
    }
}
