<?php

namespace App\Http\Controllers\nonabonne;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NonAbonneController extends Controller
{
    public function index()
    {
        return view('nonabonne.index');
    }

    public function servicesSupplementaires()
    {
        return view('nonabonne.services_supplementaires');
    }
}
