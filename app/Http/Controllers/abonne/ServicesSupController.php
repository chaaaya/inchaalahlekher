<?php

namespace App\Http\Controllers\Abonne;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Location;

class ServicesSupController extends Controller
{
    public function index()
    {
        $hotels = Hotel::all();
        $locations = Location::all();
        
        return view('client.abonne.services.services_supplementaires', compact('hotels', 'locations'));
    }
}
