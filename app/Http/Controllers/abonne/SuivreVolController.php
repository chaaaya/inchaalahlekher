<?php

namespace App\Http\Controllers\Abonne;

use App\Http\Controllers\Controller;

class SuivreVolController extends Controller
{
    public function index()
    {
        $volsASuivre = [];
        return view('client.abonne.suivre_vols', compact('volsASuivre'));
    }
}
