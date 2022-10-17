<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order, Rapley, DB, Session;


class CmsController extends CmsMainController
{
    
    public function dashboard(){

        $dtv =& self::$dtv;
        $dtv['total_cpu'] = Rapley::totalCPUO();
        $dtv['orders'] = Order::getRecentOrders(10);
        $dtv['nav_active']['active'] = 'dashboard';
        return view('cms.cms_home', $dtv);
    }
    
    public function orders(){
        
        $dtv =& self::$dtv;

        $dtv['orders'] = Order::getOrders(10);
        $dtv['paginate_data'] = $this->createPaginateData($dtv['orders'], 'cms/orders');
        if(is_object($dtv['paginate_data'])) return $dtv['paginate_data'];
        $dtv['paginate_data']['is_details'] = false;
        $dtv['paginate_data']['redirect'] = 'cms/orders';
        $dtv['nav_active']['active'] = 'orders';
        return view('cms.orders_index',$dtv);
    }

    public function order($oid){
        self::$dtv['order'] = Order::getOrder($oid);
        self::$dtv['nav_active']['active'] = 'orders';
        return view('cms.order_index', self::$dtv);
    }

    # ajax 

    public function toggleManuCms(Request $request){

        if($request['toggleCms'] == 'yes') Session::put('close', true);
        if($request['toggleCms'] == 'no') Session::put('close', false);

    }

}
