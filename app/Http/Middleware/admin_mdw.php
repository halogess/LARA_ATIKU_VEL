<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class admin_mdw
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if (Auth::user()->role == 1) {
                if (Auth::user()->active == 1) {
                    return $next($request);
                }
                abort(403, "Your account has been deactived");
            }
            abort(403, "You are not allowed to access this page");
        }
        return redirect("login");
    }
}
