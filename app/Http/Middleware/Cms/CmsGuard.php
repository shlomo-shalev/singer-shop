<?php

namespace App\Http\Middleware\Cms;

use Closure, Session;

class CmsGuard
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

        if( ! Session::get('is_viewing') && ! Session::get('is_admin') ){
       
                return redirect('user/signin');

        }

        return $next($request);
    }
}
