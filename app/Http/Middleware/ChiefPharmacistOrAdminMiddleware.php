<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class ChiefPharmacistOrAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Vérifie si l'utilisateur est authentifié
        if (!Auth::check()) {
            return redirect()->route('getAdminAuth');
        }
         // Vérifie si l'utilisateur est un chef pharmacien ou un admin
         if (Auth::user()->chiefPharmacist()->exists() || Auth::user()->admin()->exists()) {
            return $next($request);
        }
        return $next($request);
    }
}
