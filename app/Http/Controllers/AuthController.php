<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Support\Facades\Log;


class AuthController extends Controller
{
    // public function showLoginForm($role)
    // {
    //     return view('auth.login', ['role' => $role]);
    // }
    public function showLoginForm($role = null)
{
    if ($role === null) {
        // Gérer le cas où aucun rôle n'est fourni
        // Par exemple, rediriger vers un rôle par défaut ou retourner une erreur
        return redirect()->route('login', ['role' => 'defaultRole']);  // Choisissez un rôle par défaut ou gérez autrement
    }
    return view('auth.login', ['role' => $role]);
}

    public function showRegisterForm($role)
    {
        return view('auth.register', ['role' => $role]);
    }

    public function login(Request $request)
{
    $credentials = $request->only('email', 'password', 'role');

    // Connecter les identifiants pour vérifier
    \Log::info('Identifiants de connexion', $credentials);

    if (Auth::attempt($credentials)) {
        return $this->redirectBasedOnRole(Auth::user());
    }

    return back()->withErrors([
        'email' => 'Les informations d\'identification fournies ne correspondent pas à nos enregistrements.',
    ]);
}


    public function register(Request $request, $role)
    {
        // Validation des données, y compris l'unicité de l'email
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            // 'role' => 'required|in:admin,respo,client',
        ]);

        // Création de l'utilisateur
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // 'password' => $request->password,
            'role' => $role,
            'subscription' => $request->subscription ?? 'none',
        ]);

        // Envoyer un e-mail de bienvenue
        Mail::to($user->email)->send(new WelcomeMail($user));

        // Connexion automatique de l'utilisateur après l'enregistrement
        Auth::login($user);
        // Flasher un message de succès
        session()->flash('success', 'Inscription réussie ! Bienvenue ' . $user->name);
      // Redirection en fonction du rôle
        return $this->redirectBasedOnRole($user);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
    protected function redirectBasedOnRole($user)
    {
        \Log::info('Rôle de l\'utilisateur pour la redirection: ' . $user->role);
        
        switch ($user->role) {
            case 'admin':
                return redirect()->route('admin.users.manage-users');
            case 'respo':
                return redirect()->route('respo.dashboard');
            case 'client':
                return redirect()->route('client.dashboard');
            default:
                \Log::warning('Utilisateur avec rôle non défini a essayé de se connecter', ['user_id' => $user->id]);
                return redirect('/');  // Rediriger vers une page de "rôle non reconnu" ou la page d'accueil
        }
    }
    
}