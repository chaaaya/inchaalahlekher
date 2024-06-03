<?php

namespace App\Http\Controllers\Respo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContinuityPlansController extends Controller
{
    public function index()
    {
        // Logique pour afficher les plans de continuité
        return view('respo.continuity_plans.index');
    }
}
