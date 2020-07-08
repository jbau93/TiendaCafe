<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        //si el usuario tiene el rol 1(admin), permitir el acceso
        if(Auth::user()->role == "1"):

            return $next($request);

        else:

            //de lo contrario lo retorne al home
            return redirect('/');
        
        endif;
    }
}
