<?php

namespace App\Http\Middleware;

use Closure;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request)
    {
        if ($request->session()->has('username')) {
            return redirect('admin');
        }
        return redirect('login');
    }
}
