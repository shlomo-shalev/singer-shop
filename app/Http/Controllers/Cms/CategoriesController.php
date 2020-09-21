<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MainController;
use App\Http\Requests\CategoriesRequest;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Categorie, Session;

class CategoriesController extends CmsMainController
{

    # read
    public function index()
    {
        $dtv =& self::$dtv;
        $dtv['categories'] = Categorie::orderBy('id')->paginate(7);
        $dtv['paginate_data'] = $this->createPaginateData($dtv['categories'], 'cms/categories');
        if(is_object($dtv['paginate_data'])) return $dtv['paginate_data'];
        $dtv['paginate_data']['is_details'] = false;
        $dtv['paginate_data']['redirect'] = 'cms/categories';
        $dtv['nav_active']['active'] = 'categories';
        return view('cms.categories.categories_index', $dtv);
    }

    # create
    public function create()
    {
        self::$dtv['nav_active']['active'] = 'categories';
        return view('cms.categories.categories_create', self::$dtv);
    }
    
    public function store(CategoriesRequest $request)
    {
        Categorie::SaveNew($request);
        return redirect('cms/categories');
    }
    
    # update
    public function edit(Request $request, $cid)
    {
        self::$dtv['back_to_page'] = $request['back_to_page'];
        self::$dtv['category'] = Categorie::find($cid);
        self::$dtv['nav_active']['active'] = 'categories';
        return view('cms.categories.categories_edit', self::$dtv);
    }

    public function update(CategoriesRequest $request, $cid)
    {
        Categorie::updateCategory($request, $cid);
        return redirect('cms/categories' . '?page=' . $request['back_to_page']);
    }

    # delete
    public function show(Request $request, $cid)
    {
        self::$dtv['back_to_page'] = $request['back_to_page'];
        self::$dtv['category_id'] = $cid;
        self::$dtv['nav_active']['active'] = 'categories';
        return view('cms.categories.categories_delete', self::$dtv);
    }

    public function destroy(Request $request, $cid)
    {
        try{

            Categorie::destroy($cid);
            Session::flash('warning', 'Item deleted successfully');

        }catch(QueryException $error){

            Session::flash('error', 'An item linked to another item in the system cannot be deleted');
            
        }
        
        return redirect('cms/categories' . '?page=' . $request['back_to_page']);
    }
}
