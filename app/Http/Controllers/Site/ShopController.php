<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Product;
use App\Models\Order;
use App\Models\Paginate;
use App\Models\Cart, Hash, Session;

class ShopController extends SiteMainController
{

    # pages
    public function categories(){

        $dtv =& self::$dtv;
        
        $dtv['categories'] = Categorie::getCategories(10);
        $dtv['paginate_data'] = $this->createPaginateData($dtv['categories'], 'shop');
        if(is_object($dtv['paginate_data'])) return $dtv['paginate_data'];
        
        $dtv['page_title'] .= 'Shop';
        $dtv['mini_nav'] = ['SHOP' => ''];
        $dtv['nav_active']['active'] = 'shop';
        $dtv['nav_active']['active_shop'] = 'all-categories';
        return view('site.shop.categories', $dtv);

    }

    public function category(Request $request, $curl){

        $dtv =& self::$dtv;

        $order_by = $dtv['order_by'] = $request['orderBy'] ? $request['orderBy'] : '';
        $dtv['products'] = Product::getCategoryProducts($curl, 10, $order_by);
        $dtv['paginate_data'] = $this->createPaginateData($dtv['products'], 'shop/' . $curl);
        if(is_object($dtv['paginate_data'])) return $dtv['paginate_data'];
        
        $is_item = $dtv['paginate_data']['items_view_total'];
        if( ! ($is_item ?? false) ) abort(404);
        
        $producs_title = $dtv['products'][0]->title;
        $dtv['name_category'] = $producs_title;
        
        $dtv['paginate_data']['name_category'] = '/' . $dtv['products'][0]->url;
        $dtv['paginate_data']['order_by'] = $order_by;

        $dtv['page_title'] .= $producs_title;
        $dtv['mini_nav'] = [
            'SHOP' => 'shop',
            $producs_title => '',
        ];
        $dtv['nav_active']['active'] = 'shop';
        $dtv['nav_active']['active_shop'] = $curl;
        $dtv['curl'] = $curl;

        return view('site.shop.category', $dtv);
        
    }

    public function product($curl, $purl){
        
        $dtv =& self::$dtv;

        $dtv['product'] = product::getProduct($curl, $purl);
        if( ! ($dtv['product'] ?? false) ) abort(404);

        $dtv['page_title'] .= $dtv['product']->ptitle;
        $dtv['mini_nav'] = [
            'SHOP' => 'shop',
            $dtv['product']->title => 'shop/' . $dtv['product']->url,
            $dtv['product']->ptitle => '',
        ];
        $dtv['nav_active']['active'] = 'shop';
        $dtv['nav_active']['active_shop'] = $curl;
        return view('site.shop.product', $dtv);

    }

    public function cart(Request $request){

        $dtv =& self::$dtv;

        if( $request['pid'] ) return Cart::updateCart($request);

        $dtv['page_title'] .= 'Cart page';
        $dtv['mini_nav'] = [
            'SHOP' => 'shop',
            'CART' => ''
        ];
        return view('site.shop.cart', $dtv);
        
    }

    public function checkout(){

        if(! Session::has('user_id')){

            return redirect('user/signup?backTo=shop/cart');

        }
        
        Order::saveOrder();

        return redirect('shop');

    }
    
    # CRUD to cart
    public function addToCart(Request $request){
        
        Cart::addToCart($request['pid'], $request['quantity']);

    }

    public static function deleteFromCart(Request $request){

        Cart::deleteCart($request['pid']);

    }

    public function clearCart(){
        
        Cart::clear();
        Session::flash('warning', 'The cart emptied!');

    }

}