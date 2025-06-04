<?php

namespace App\Http\Middleware;

use Closure;

class VerifyAjaxRequest
{
    public function handle($request, Closure $next)
    {
        if (!$request->ajax() && !$request->wantsJson()) {
            return response()->json(['error' => 'AJAX request required'], 403);
        }
        return $next($request);
    }
}