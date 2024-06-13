<?php

namespace App\Http\Controllers;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientAuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('client.register'); // Assurez-vous que vous avez une vue pour le formulaire d'inscription
    }

    public function register(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:clients', // Vérifiez l'unicité dans la table 'clients'
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Créer un nouvel utilisateur client
        $client = Client::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Authentifier et rediriger l'utilisateur après l'inscription
        Auth::guard('client')->login($client);

        return redirect()->route('accueil'); // Redirigez l'utilisateur vers la page d'accueil après l'inscription
    }

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
    
            // Redirection en fonction de l'état d'abonnement
            $redirectRoute = Auth::guard('client')->user()->subscription ? 'abonne.index' : 'nonabonne.index';
    
            return redirect()->intended(route($redirectRoute));
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