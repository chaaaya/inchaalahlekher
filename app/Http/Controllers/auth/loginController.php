<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Routing\Controller; // Correction ici
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/'); // Rediriger vers la page d'accueil ou de connexion
    }
}