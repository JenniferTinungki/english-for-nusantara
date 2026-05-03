<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PreventRequestsDuringMaintenance
{
    public function handle(Request $request, Closure $next)
    {
        // Bisa diimplementasi jika mau fitur maintenance mode
        return $next($request);
    }
}