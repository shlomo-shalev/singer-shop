<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB, Session, Hash, CartPlugin;

class Cart extends Model
{

    public static function __callStatic($method, $args)
    {
        if($method == 'updateCartNow') $method = 'update';
        return CartPlugin::$method(...$args);
        
    }

    public static function addToCart($pid, $quantity){

        if( is_numeric($quantity) && is_numeric($pid) ){

            $product = DB::table('products as p')
            ->join('categories as c', 'c.id', '=', 'categorie_id')
            ->where('p.id', '=', $pid)
            ->select('p.id', 'p.price', 'p.purl', 'p.pimage', 'p.ptitle', 'c.url')
            ->first();

            if($product){

                self::add($product->id, $product->ptitle, $product->price, $quantity, [
                    'image' => $product->pimage,
                    'url' => 'shop/' . $product->url . '/' . $product->purl,
                ]);
                Session::flash('warning', 'product successfully added!');
                
                
            }
            
        }
        
    }

    public static function updateCart($request){

        if( is_numeric($request['pid']) && is_string($request['quantity']) ){

            if($request['quantity'] == 'plus'){

                self::updateCartNow($request['pid'], [
                    'quantity' => 1
                ]);
                Session::flash('warning', 'Item successfully added!');

            } elseif($request['quantity'] == 'minus'){

                self::updateCartNow($request['pid'], [
                    'quantity' => -1
                ]);
                Session::flash('warning', 'Item deleted successfully!');
                
            }

        }

        return redirect('shop/cart');
        
    }

    public static function deleteCart($pid){
        
            self::remove($pid);
            Session::flash('warning', 'product delete added!');

    }

}