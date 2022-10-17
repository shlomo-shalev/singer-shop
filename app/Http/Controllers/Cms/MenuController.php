<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuRequest;
use Illuminate\Http\Request;
use App\Models\Menu;
use Exception, Session;

class MenuController extends CmsMainController
{

    # read
    public function index()
    {
        $dtv =& self::$dtv;
        $dtv['menus'] = Menu::paginate(10);
        $dtv['paginate_data'] = $this->createPaginateData($dtv['menus'], 'cms/menu');
        if(is_object($dtv['paginate_data'])) return $dtv['paginate_data'];
        $dtv['paginate_data']['is_details'] = false;
        $dtv['paginate_data']['redirect'] = 'cms/menu';
        self::$dtv['nav_active']['active'] = 'menu';
        return view('cms.menus.menu_index', $dtv);
    }

    # create
    public function create()
    {
        self::$dtv['nav_active']['active'] = 'menu';
        return view('cms.menus.menu_create', self::$dtv);
    }
    
    public function store(MenuRequest $request)
    {
        Menu::SaveNew($request);
        return redirect('cms/menu');
    }
    
    # update
    public function edit(Request $request, $lid)
    {
        self::$dtv['back_to_page'] = $request['back_to_page'];
        self::$dtv['menu'] = Menu::find($lid);
        self::$dtv['nav_active']['active'] = 'menu';
        return view('cms.menus.menu_edit', self::$dtv);
    }

    public function update(MenuRequest $request, $lid)
    {
        Menu::updateItem($request);
        return redirect('cms/menu' . '?page=' . $request['back_to_page']);
    }

    # delete
    public function show(Request $request, $lid)
    {
        self::$dtv['back_to_page'] = $request['back_to_page'];
        self::$dtv['menu_id'] = $lid;
        self::$dtv['nav_active']['active'] = 'menu';
        return view('cms.menus.menu_delete', self::$dtv);
    }

    public function destroy(Request $request, $lid)
    {
        try{

            Menu::destroy($lid);
            Session::flash('warning', 'Item deleted successfully');

        }catch(Exception $error){

            Session::flash('error', 'An item linked to another item in the system cannot be deleted');
            
        }
        
        return redirect('cms/menu' . '?page=' . $request['back_to_page']);
    }
}
