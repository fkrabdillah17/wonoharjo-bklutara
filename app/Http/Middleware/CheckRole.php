<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (in_array($request->user()->role, $roles)) {
            return $next($request);
        } else {
            if ($request->user()->role == 1 || $request->user()->role == 0) {
                return redirect('/admin');
            } else {
                return redirect('/admin/bumdes');
            }
        }
    }
}
