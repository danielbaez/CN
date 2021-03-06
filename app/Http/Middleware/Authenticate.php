<?php

namespace SisVenta\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Authenticate
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
        if ($this->auth->guest()) {
            
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('auth/login');
            }
        }

        if($this->auth->check() && $this->auth->user()->estado !== 1){
            $this->auth->logout();
            //return redirect('auth/login')->withErrors('Su cuenta de usuario está desacticada');
            return redirect()->route('login-get')->withErrors('Su cuenta está desactivada');
        }

        \Session::put('image-user', $this->auth->user()->foto);
        //\Session::get('id_sucursal')

        return $next($request);
    }
}
