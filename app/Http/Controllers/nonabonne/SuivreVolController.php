<?php

namespace App\Http\Controllers\nonAbonne;

use App\Http\Controllers\Controller;

class SuivreVolController extends Controller
{
    public function index()
    {
        $volsASuivre = [];
        return view('client.nonabonne.suivre_vols', compact('volsASuivre'));
    }
}
