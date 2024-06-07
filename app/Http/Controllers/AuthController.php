<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use App\Mail\RegistrationSuccessMail;


use App\Models\Reservation;
class AuthController extends Controller
{
    public function showLoginForm($role = null)
    {
        if ($role === null) {
            return redirect()->route('login', ['role' => 'defaultRole']);
        }
        return view('auth.login', ['role' => $role]);
    }

    public function showRegisterForm($role)
    {
        return view('auth.register', ['role' => $role]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $role = $request->input('role');

        Log::info('Identifiants de connexion', ['email' => $credentials['email'], 'role' => $role]);

        // Tentative de connexion sans inclure le rôle dans les credentials
        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password'], 'role' => $role])) {
            return $this->redirectBasedOnRole(Auth::user());
        }

        return back()->withErrors([
            'email' => 'Les informations d\'identification fournies ne correspondent pas à nos enregistrements.',
        ]);
    }
    public function register(Request $request, $role)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $role,
            'subscription' => $request->subscription ?? 'none',
        ]);
    
        // Envoi de l'email de confirmation
        Mail::to($user->email)->send(new RegistrationSuccessMail($user->name));
    
        Auth::login($user);
        session()->flash('success', 'Inscription réussie ! Bienvenue ' . $user->name);
    
        return $this->redirectBasedOnRole($user);
    }
    

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
    protected function redirectBasedOnRole($user)
    {
        Log::info('Rôle de l\'utilisateur pour la redirection: ' . $user->role);
    
        switch ($user->role) {
            case 'admin':
                Log::info('Redirection vers admin.service.manage-services');
                return redirect()->route('admin.service.manage-services');
            case 'respo':
                Log::info('Redirection vers respo.dashboard');
                return redirect()->route('respo.dashboard');
            case 'client':
                Log::info('Redirection vers client.dashboard');
                return redirect()->route('abonne.index');
            default:
                Log::warning('Utilisateur avec rôle non défini a essayé de se connecter', ['user_id' => $user->id]);
                return redirect('/');
        }
    }
}    