<?php
namespace SisVenta\Http\Middleware;
use Closure;
use Illuminate\Contracts\Auth\Guard;
class Sucursal
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

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
            $sucursal = \SisVenta\Sucursal::where('id', \Session::get('id_sucursal'))->where('estado', 1)->get();
            if(!$sucursal->isEmpty()){
                return $next($request);  
            }
            else
            {
                /*$this->auth->logout();
                return redirect()->route('login-get')->withErrors('Se ha desactivado la sucursal');*/
                return redirect()->route('home');
            }
            
        }
    }
}