<?php

namespace App\Http\Controllers\Respo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommunicateController extends Controller
{
    public function index()
    {
        // Logique pour afficher la page de communication
        return view('respo.communicate.index');
    }
}
