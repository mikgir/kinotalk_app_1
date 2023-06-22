<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && (auth()->user()->hasRole('super_admin') || auth()->user()->hasRole('moderator'))) {
            return $next($request);
        }

        return redirect('/');
    }
}

