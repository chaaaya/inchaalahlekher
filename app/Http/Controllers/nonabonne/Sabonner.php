<?php

namespace App\Http\Controllers\nonAbonne;

use App\Http\Controllers\Controller;

class SabonnerController extends Controller
{
    public function index()
    {
        return view('client.nonabonne.sabonner');
    }
}
