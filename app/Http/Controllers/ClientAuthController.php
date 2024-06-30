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
    // Validate the form data
    $request->validate([
        'name' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'numero_telephone' => 'required|string|max:20',
        'email' => 'required|string|email|max:255|unique:clients', // Check for unique email in 'clients' table
        'password' => 'required|string|min:8|confirmed',
    ]);

    // Create a new client user
    $client = Client::create([
        'name' => $request->name,
        'prenom' => $request->prenom,
        'numero_telephone' => $request->numero_telephone,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'subscription_status' => 'pending', // Set subscription_status to 'rejected'
    ]);

    // Authenticate the user
    Auth::guard('client')->login($client);

    return redirect()->route('accueil'); // Redirect to the homepage after registration
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
    
        // Attempt authentication using the 'client' guard
        if (Auth::guard('client')->attempt($credentials)) {
            $request->session()->regenerate();
    
            // Check the subscription status
            $user = Auth::guard('client')->user();
            if ($user->subscription_status === 'accepted') {
                return redirect()->route('abonne.index'); // Redirect to the abonne dashboard
            } else {
                return redirect()->route('nonabonne.index'); // Redirect to the non-abonne page
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