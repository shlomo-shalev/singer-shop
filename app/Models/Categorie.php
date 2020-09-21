<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Rapley, Session, DB;

class Categorie extends Model
{

    public static function getCategories($view_max){

        return self::where('visibility', '=', '1')
        ->select('id', 'title', 'description', 'image', 'url')
        ->paginate($view_max);

    }

    static public function getThreeCategories(){
        return self::where('visibility', '=', 1)
        ->select('title', 'url')
        ->limit(3)
        ->get();
    }

    static public function saveNew($request){

        $category = new self();
        $category->title = $request['title'];
        $category->description = $request['description'];
        $category->image = Rapley::saveImage($request, '/images/categories/');
        $category->url = $request['url'];
        $category->is_open = $request['open'] == 'on';
        $category->visibility = $request['visibility'] == 'on';
        $category->save();
        Session::flash('warning', 'Item saved successfully');

    }

    static public function updateCategory($request){
        $category = self::find($request['item_id']);
        $category->title = $request['title'];
        $category->description = $request['description'];
        $category->image = Rapley::saveImage($request, '/images/categories/', $category->image);
        $category->url = $request['url'];
        $category->is_open = $request['open'] == 'on';
        $category->visibility = $request['visibility'] == 'on';
        $category->save();
        Session::flash('warning', 'Item successfully updated');
    }

    static public function getFirstCategoriesProducts(){
        return collect(DB::select('
        SELECT p.*, c.title, c.url FROM (SELECT * FROM categories LIMIT 3) c JOIN products p WHERE c.id = p.categorie_id
        '));
    }

}