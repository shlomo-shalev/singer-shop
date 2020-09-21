<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MainController;
use Illuminate\Http\Request;

class CmsMainController extends MainController
{

    public function __construct(){

        $this->middleware('cmsCUDguard', ['only' => ['store', 'update', 'destroy']]);
        
    }


}
