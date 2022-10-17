<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB, Session, App\Models\Cart;

class Order extends Model
{
    
    public static function saveOrder(){
        
        if(!Cart::isEmpty()){
            $order = new self();
            $order->user_id = Session::get('user_id');
            $order->total = Cart::GetTotal();
            $order->data = serialize(Cart::getContent()->toArray());
            $order->save();
            Cart::clear();
            Session::flash('warning', 'Your order has been successfully received!');
        }

    }

    static public function getOrders($view_max){

        return DB::table('orders as o')
        ->leftJoin('users as u', 'u.id', 'o.user_id')
        ->select('o.*', 'u.name')
        ->orderBy('o.id', 'desc')
        ->paginate($view_max);

    }

    static public function getOrder($oid){

        return DB::table('orders as o')
        ->leftJoin('users as u', 'u.id', 'o.user_id')
        ->where('o.id', '=', $oid)
        ->select('o.*', 'u.name')
        ->first();

    }

    static public function getRecentOrders($view_max){
        return DB::table('orders as o')
        ->leftJoin('users as u', 'o.user_id', 'u.id')
        ->select('o.*', 'u.name')
        ->orderBy('id', 'desc')
        ->limit($view_max)
        ->get();
    }

}