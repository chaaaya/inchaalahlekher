<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckFirstReservation
{
    public function handle($request, Closure $next)
    {
        $client = Auth::guard('client')->user();
        $request->attributes->set('isFirstReservation', !$client->reservations()->exists());

        return $next($request);
    }
}