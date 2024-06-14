<?php
// app/Http/Controllers/Abonne/OffresController.php

namespace App\Http\Controllers\Abonne;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;

class OffresController extends Controller
{
    public function index()
    {
        $offres = Offer::all();
        return view('client.abonne.offres', compact('offres'));
    }
}
