<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB, Session;

class Content extends Model
{
    static public function getContent($menu_url){

        return DB::table('contents as cn')
        ->join('menus as m', 'm.id', '=', 'cn.menu_id')
        ->where('m.url', '=', $menu_url)
        ->select('cn.cntitle', 'cn.cndescription', 'm.title')
        ->where('m.is_open', '=', 1)
        ->where('cn.visibility', '=', '1')
        ->get();

    }

    static public function SaveNew($request){

        $content = new self();
        $content->menu_id = $request['menu_link'];
        $content->cntitle = $request['title'];
        $content->cndescription = $request['description'];
        $content->visibility = $request['visibility'] == 'on';
        $content->save();
        Session::flash('warning', 'Item saved successfully');

    }

    static public function updateItem($request, $id){
        $content = self::find($id);
        $content->menu_id = $request['menu_link'];
        $content->cntitle = $request['title'];
        $content->cndescription = $request['description'];
        $content->visibility = $request['visibility'] == 'on';
        $content->save();
        Session::flash('warning', 'Item successfully updated');
    }

}