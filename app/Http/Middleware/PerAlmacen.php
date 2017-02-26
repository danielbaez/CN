<?php

namespace SisVenta\Http\Middleware;

use Closure;

class PerAlmacen
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(\Session::get('per_almacen') == true)
        {
            return $next($request);
        }
        else
        {
            return redirect()->route('dashboard');
        }
    }
}
