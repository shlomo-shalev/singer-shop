<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB, App\Models\Cart, Session, Rapley;

class Product extends Model
{
    # get
    public static function getCategoryProducts($curl, $view_max, $orderBy){
               $query = DB::table('products as p')
               ->rightJoin('categories as c', 'c.id', '=', 'p.categorie_id')
               ->select('p.*', 'c.title', 'c.url')
               ->where('c.url', '=', $curl)
               ->where('p.visibility', '=', 1)
               ->where('c.is_open', '=', 1);

               if($orderBy){

                   if($orderBy == 'low'){
                       $query->orderBy('p.price', 'desc');
                       
                    }elseif($orderBy == 'high'){

                        $query->orderBy('p.price');

                    }

               }

               return $query->paginate($view_max);
    }

    public static function getProduct($curl, $purl){

        return DB::table('products as p')
        ->join('categories as c', 'c.id', '=', 'p.categorie_id')
        ->where('p.purl', '=', $purl)
        ->where('c.url', '=', $curl)
        ->where('p.is_open', '=', 1)
        ->select('p.*', 'c.title', 'c.url')
        ->first();

    }

    static public function getProducts(){
        return DB::table('products as p')
        ->join('categories as c', 'c.id', 'p.categorie_id')
        ->select('p.*', 'c.title', 'p.purl', 'c.url')
        ->orderBy('p.id')
        ->paginate(7);
    }

    static public function getRecentProducts($view_max){

        return DB::table('products as p')
        ->where('p.visibility', '=', 1)
        ->join('categories as c', 'c.id', 'p.categorie_id')
        ->select('p.*', 'c.url')
        ->limit($view_max)
        ->orderBy('p.id', 'desc')
        ->get();

    }

    # Create
    static public function saveNew($request){

        $product = new self();
        $product->categorie_id = $request['category'];
        $product->ptitle = $request['title'];
        $product->purl = $request['url'];
        $product->price = $request['price'];
        $product->particle = $request['description'];
        $product->pimage = Rapley::saveImage($request, '/images/products/');
        $product->visibility = $request['visibility'] == 'on';
        $product->is_open = $request['open'] == 'on';
        $product->save();
        Session::flash('warning', 'Item saved successfully');

    }

    # Update
    static public function updateItem($request){
        $product = self::find($request['item_id']);
        $product->categorie_id = $request['category'];
        $product->ptitle = $request['title'];
        $product->purl = $request['url'];
        $product->price = $request['price'];
        $product->particle = $request['description'];
        $product->pimage = Rapley::saveImage($request, '\\images\\products\\', $product->pimage);
        $product->visibility = $request['visibility'] == 'on';
        $product->is_open = $request['open'] == 'on';
        $product->save();
        Session::flash('warning', 'Item successfully updated');
    }

}