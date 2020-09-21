<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Content;
use App\Models\Product;

class PageController extends SiteMainController
{
    
    public function home(){

        $dtv =& self::$dtv;

        $dtv['page_title'] .= 'Home';
        $dtv['nav_active']['active'] = 'home';
        $dtv['products'] = Product::getRecentProducts(4)->shuffle();
        $dtv['view_products'] = Categorie::getFirstCategoriesProducts();
        $dtv['view_products'] = $dtv['view_products']->groupBy('categorie_id');
        return view('site.home', $dtv);

    }

    public function dynamicMenu($menu_url){

        $dtv =& self::$dtv;

        $dtv['contents'] = Content::getContent($menu_url);
        if(!$dtv['contents']->count()) abort(404);

        $dtv['nav_active']['active'] = $menu_url;
        $dtv['page_title'] .= $dtv['contents'][0]->title;
        return view('site.dynamic_menu', $dtv);

    }

}