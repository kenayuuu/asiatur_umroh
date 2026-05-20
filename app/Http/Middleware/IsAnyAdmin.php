<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAnyAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            if ($request->expectsJson()) {
                abort(401, 'Unauthorized');
            }
            return redirect()->route('login.form');
        }

        $user = auth()->user();

        if (!$user->isAdmin()) {
            if ($request->expectsJson()) {
                abort(403, 'Forbidden');
            }
            return redirect('/')->with('error', 'Akses admin diperlukan.');
        }

        return $next($request);
    }
}
