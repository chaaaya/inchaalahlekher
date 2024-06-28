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
            'prenom' => 'required|string|max:255',
            'numero_telephone' => 'required|string|max:20',
            'email' => 'required|string|email|max:255|unique:clients', // Vérifiez l'unicité dans la table 'clients'
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Créer un nouvel utilisateur client
        $client = Client::create([
            'name' => $request->name,
            'prenom' => $request->prenom,
            'numero_telephone' => $request ->numero_telephone,
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

            // Vérification du statut d'abonnement
            $user = Auth::guard('client')->user();
            if ($user->subscription) {
                return redirect()->route('abonne.index'); // Rediriger vers le dashboard de l'abonné
            } else {
                return redirect()->route('nonabonne.index'); // Rediriger vers le dashboard du non abonné
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