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
            if(!$sucursal->isEmpty())
            {
                $permisos = \SisVenta\Usuario::where('id_empleado', $this->auth->user()->id)->where('id_sucursal', \Session::get('id_sucursal'))->get();
                \Session::put('per_mantenimiento', false);
                \Session::put('per_almacen', false);
                \Session::put('per_compra', false);
                \Session::put('per_venta', false);
                \Session::put('per_seguridad', false);
                \Session::put('per_con_compra', false);
                \Session::put('per_con_venta', false);
                if($permisos[0]->per_mantenimiento == 1)
                {
                    \Session::put('per_mantenimiento', true);
                }
                if($permisos[0]->per_almacen == 1)
                {
                    \Session::put('per_almacen', true);
                }
                if($permisos[0]->per_compra == 1)
                {
                    \Session::put('per_compra', true);
                }
                if($permisos[0]->per_venta == 1)
                {
                    \Session::put('per_venta', true);
                }
                if($permisos[0]->per_seguridad == 1)
                {
                    \Session::put('per_seguridad', true);
                }
                if($permisos[0]->per_con_compra == 1)
                {
                    \Session::put('per_con_compra', true);
                }
                if($permisos[0]->per_con_venta == 1)
                {
                    \Session::put('per_con_venta', true);
                }

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