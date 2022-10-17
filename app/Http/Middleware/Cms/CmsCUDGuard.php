<?php

namespace App\Http\Middleware\Cms;

use Closure, Session;

class CmsCUDGuard
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

        if( ! Session::get('is_admin') ){
       
            Session::flash('error', 'You do not have permission to perform actions');
            return redirect('user/logout');

        }

        return $next($request);
    }
}
