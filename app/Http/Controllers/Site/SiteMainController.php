<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\MainController;
use App\Models\Categorie;
use App\Models\Menu;

class SiteMainController extends MainController
{

    public function __construct(){

        $dtv =& self::$dtv;
        $dtv['menus'] = Menu::getMenu();
        $dtv['categories_header'] = Categorie::getThreeCategories();

    }

}