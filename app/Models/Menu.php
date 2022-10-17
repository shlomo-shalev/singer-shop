<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Session;

class Menu extends Model
{

    static public function getMenu(){
        return self::where('visibility', '=', '1')
        ->select('link', 'url')
        ->get();
    }

    static public function SaveNew($request){

        $menu = new self();
        $menu->title = $request['title'];
        $menu->url = $request['url'];
        $menu->link = $request['link'];
        $menu->visibility = $request['visibility'] == 'on';
        $menu->is_open = $request['open'] == 'on';
        $menu->save();
        Session::flash('warning', 'Item saved successfully');

    }

    static public function updateItem($request){
        $menu = self::find($request['item_id']);
        $menu->title = $request['title'];
        $menu->url = $request['url'];
        $menu->link = $request['link'];
        $menu->visibility = $request['visibility'] == 'on';
        $menu->is_open = $request['open'] == 'on';
        $menu->save();
        Session::flash('warning', 'Item successfully updated');
    }

}
