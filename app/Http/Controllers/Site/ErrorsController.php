<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Menu;

class ErrorsController extends SiteMainController
{

    public function errors404(){
        self::$dtv['page_title'] .= 'Error 404';
        return view('errors.404', self::$dtv);
    }

    public static function error404Data(){
        self::$dtv['page_title'] = 'Error 404';
        return self::$dtv;

    }

    public function error500Data(){

        self::$dtv['page_title'] .= 'Error 500';
        return self::$dtv;
    }

}