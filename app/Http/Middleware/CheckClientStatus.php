<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckClientStatus
{
    public function handle($request, Closure $next)
    {
        $user = Auth::guard('client')->user();

        if ($user && $user->status !== 'accepted') {
            Auth::guard('client')->logout();
            return redirect()->route('login')->withErrors(['Votre compte n\'a pas encore été approuvé.']);
        }

        return $next($request);
    }
}
