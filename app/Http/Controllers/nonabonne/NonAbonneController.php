<?php

namespace App\Http\Controllers\nonabonne;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NonAbonneController extends Controller
{
    public function index()
    {
        return view('client.nonabonne.index');
    }

    public function servicesSupplementaires()
    {
        return view('client.nonabonne.services_supplementaires');
    }
}
