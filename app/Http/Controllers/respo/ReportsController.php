<?php

namespace App\Http\Controllers\Respo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function index()
    {
        // Logique pour afficher les rapports
        return view('respo.reports.index');
    }
}
