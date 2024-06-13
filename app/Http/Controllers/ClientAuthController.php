<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('client.login'); // Assurez-vous que cette vue existe
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Tentative d'authentification en utilisant le guard 'client'
        if (Auth::guard('client')->attempt($credentials)) {
            $request->session()->regenerate();

            // Vérifier si le client est abonné
            if (Auth::guard('client')->user()->subscription) {
                return redirect()->intended(route('nonabonne.index')); // Rediriger vers la page des abonnés
            } else {
                return redirect()->intended(route('abonne.index')); // Rediriger vers une autre page pour les non-abonnés
            }
        }

        return back()->withErrors([
            'email' => 'Les identifiants ne correspondent pas à nos enregistrements.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('client')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
