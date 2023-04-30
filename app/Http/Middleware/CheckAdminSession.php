<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class CheckAdminSession
{

    public function handle($request, Closure $next)
    {
        if (!(Session::has('DeveloperUser_type')) || !(Session::has('DeveloperUser_id'))) {
            return redirect('/')->with('error', 'Your session has expired. Please log in again.');
        } else if (Session::get('DeveloperUser_id') < 1 || Session::get('DeveloperUser_type') != "ADMIN") {
            return redirect('/')->with('error', 'Your session has expired. Please log in again.');
        }

        $input = $request->all();
        if (!isset($input['allow_html_content']))
            array_walk_recursive($input, function (&$input) {
                if (!empty($input))
                    $input = strip_tags($input);
            });

        $request->merge($input);
        return $next($request);
    }
}
