<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class RespoAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('respo.login'); // Assurez-vous que cette vue existe
    }

    public function login(Request $request)
    {
        // Validation des données entrantes
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Tentative d'authentification
        if (Auth::guard('responsable')->attempt($credentials)) {
            $request->session()->regenerate();
            Log::info('Respo authenticated successfully.');


            return redirect()->intended('/respo/welcome'); // Redirection après connexion réussie
        }

        // En cas d'échec de l'authentification, retourner en arrière avec des erreurs
        return back()->withErrors([
            'email' => 'Les identifiants ne correspondent pas à nos enregistrements.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('responsable')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}