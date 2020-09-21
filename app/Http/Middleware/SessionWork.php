<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Controllers\MainController;
use App\Models\Cart;

class SessionWork
{

    public function handle($request, Closure $next)
    {

        if(!Cart::isEmpty()){
            
            $dtv =& MainController::$dtv;
            
            $dtv['cart_content'] = Cart::getContent();
            $dtv['cart_count'] = $dtv['cart_content']->count();
            $dtv['cart_content'] = $dtv['cart_content']->toArray();
            sort($dtv['cart_content']);
            $dtv['cart_total'] = Cart::GetTotal();

        }

        return $next($request);
    }

}