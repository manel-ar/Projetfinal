<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheifPharmacistMiddleware
{
    /**
     * Handle an incoming requesat.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
// Vérifie si l'utilisateur est authentifié
if (!Auth::check()) {
    return redirect()->route('getAdminAuth');
} else {
    if (Auth::user()->chiefPharmacist) {
        return $next($request);
    }
}    }
}
