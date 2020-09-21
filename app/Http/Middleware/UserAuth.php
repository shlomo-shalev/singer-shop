<?php

namespace App\Http\Middleware;

use Closure, Session;
use App\Http\Controllers\MainController;

class UserAuth
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

        if(Session::has('user_id')){

            return redirect('shop');

        }

        return $next($request);
    }
}