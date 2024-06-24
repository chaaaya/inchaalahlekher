<?php

namespace App\Http\Controllers\abonne;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Location;
class service1Controller extends Controller
{
    public function index()
    {
        $hotels = Hotel::all();
        $locations = Location::all();
        
        return view('client.nonabonne.services.services_supplementaires', compact('hotels', 'locations'));
    }
}
