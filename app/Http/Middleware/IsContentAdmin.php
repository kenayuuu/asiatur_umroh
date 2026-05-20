<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsContentAdmin
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

        if (!auth()->user()->canManageContent()) {
            if ($request->expectsJson()) {
                abort(403, 'Forbidden');
            }
            return redirect('/')->with('error', 'Akses hanya untuk Admin Konten atau Super Admin.');
        }

        return $next($request);
    }
}
