<?php

namespace App\Http\Controllers\Abonne;

use App\Http\Controllers\Controller;

class SabonnerController extends Controller
{
    public function index()
    {
        return view('client.abonne.sabonner');
    }
}
