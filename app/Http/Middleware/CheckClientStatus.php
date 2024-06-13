<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; // Ajoutez ceci

class CheckClientStatus
{
    public function handle($request, Closure $next)
    {
        Log::info('Middleware CheckClientStatus exécuté'); // Ajoutez ceci
        
        if (Auth::check() && Auth::user()->status === 'rejected') {
            Log::info('Utilisateur rejeté, déconnexion'); // Ajoutez ceci
            Auth::logout();
            return redirect()->route('client.login')->with('error', 'Votre compte a été refusé par l\'administrateur.');
        }

        return $next($request);
    }
}
