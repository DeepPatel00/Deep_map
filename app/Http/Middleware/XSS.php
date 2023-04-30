<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class XSS
{
    public function handle(Request $request, Closure $next)
    {
        $input = $request->all();
        array_walk_recursive($input, function (&$input) {
            if (!empty($input))
                $input = strip_tags($input);
        });
        $request->merge($input);
        return $next($request);
    }
}
