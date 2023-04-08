<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class FreelanceAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Vérifiez si l'utilisateur est authentifié
        if (!Auth::check()) {
            return redirect('/login');
        }

        // Récupérez l'utilisateur actuellement authentifié
        $user = Auth::user();

        // Vérifiez si l'utilisateur a une relation avec le modèle Freelance
        if (!$user->freelance()->exists()) {
            return redirect()->route('register.etape.1')->with('error', 'Vous n\'avez pas accès à cette page');
        }

        return $next($request);
    }
}
