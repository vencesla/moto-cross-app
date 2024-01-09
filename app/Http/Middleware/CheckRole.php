<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Vérifier si l'utilisateur a le rôle requis
        if ($request->user() && $request->user()->hasRole($role)) {
            return $next($request);
        }

        // Rediriger ou renvoyer une réponse d'erreur selon vos besoins
        return response('Unauthorized.', 401);
    }
}
