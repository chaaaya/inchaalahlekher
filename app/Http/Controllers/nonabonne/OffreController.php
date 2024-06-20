<?php

namespace App\Http\Controllers\nonAbonne;

use App\Http\Controllers\Controller;
use App\Models\Offer;

class OffreController extends Controller
{
    public function index()
    {
        $offres = Offer::all();
        return view('client.nonabonne.offres.index', compact('offres'));
    }
}
