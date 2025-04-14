<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ChauffeurMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Hier kun je je logica zetten, bijvoorbeeld:
        if (!auth()->check() || !auth()->user()->isChauffeur()) {
            return redirect()->route('login.show');
        }

        return $next($request);
    }
}
