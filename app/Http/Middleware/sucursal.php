<?php
namespace SisVenta\Http\Middleware;
use Closure;
class Sucursal
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
        //dd(\Session::get('id_sucursal'));
        if(empty(\Session::get('id_sucursal')))
        {
            return redirect()->route('home');
        }
        else
        {
            return $next($request);
        }
    }
}