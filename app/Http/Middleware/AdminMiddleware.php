<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Ellenőrizzük, hogy a felhasználó be van-e jelentkezve ÉS admin-e
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403, 'Ehhez nincs jogosultságod.');
        }

        return $next($request);
    }
}