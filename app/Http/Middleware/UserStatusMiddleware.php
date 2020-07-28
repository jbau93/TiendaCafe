<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserStatusMiddleware
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
        //si el estado del usuario no es 100, continuará dentro de la plataforma
        if(Auth::user()->status != "100"){

            return $next($request);

        }else{

             //de lo contrario cierra sesion
             return redirect('/logout');
        }
        
    }
}
