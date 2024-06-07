<?php

namespace App\Http\Controllers\Abonne;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewSubscriptionController extends Controller
{
    public function showSubscriptionForm()
    {
        return view('abonne.sabonner');
    }

}
