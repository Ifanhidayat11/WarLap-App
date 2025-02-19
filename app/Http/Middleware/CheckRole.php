<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!$request->user() || !in_array(strtolower($request->user()->role), array_map('strtolower', $roles))) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}