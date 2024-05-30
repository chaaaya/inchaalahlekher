<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RespoController extends Controller
{
    public function adminsManagement()
    {
        return view('respo.manage-admins');
    }

    public function reportsAnalyze()
    {
        return view('respo.analyse-rapports');
    }

    public function communicatePrenantes()
    {
        return view('respo.communicate');
    }

    public function planesElaborate()
    {
        return view('respo.elaborer-planes');
    }

}