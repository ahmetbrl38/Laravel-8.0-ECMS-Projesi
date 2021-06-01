<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserRole
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if (!\Auth::guest() && \Auth::user()->role == 'admin') {

            return $next($request);

        } else {

            return redirect(route('nedmin.Index'))->with('error', 'Erişim yetkiniz yok.');

        }

        return redirect(route('nedmin.Index'));

    }
}
