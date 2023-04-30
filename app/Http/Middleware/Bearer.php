<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Str;

class Bearer
{

    public function handle($request, Closure $next)
    {
        $header = $request->header('Authorization', '');
        if (Str::substr($header, 7) != env('API_BEARER_TOKEN')) {
            return  response()->json(['success' => false, "data" => "unauthorized"], 401);
        }
        return $next($request);
    }
}
