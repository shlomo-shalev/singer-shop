<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContentsRequest;
use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Menu;
use Exception, Session;

class ContentsController extends CmsMainController
{
    
    # read
    public function index()
    {
        $dtv =& self::$dtv;
        $dtv['contents'] = Content::paginate(10);
        self::$dtv['menus'] = Menu::all();
        $dtv['paginate_data'] = $this->createPaginateData($dtv['contents'], 'cms/contents');
        if(is_object($dtv['paginate_data'])) return $dtv['paginate_data'];
        $dtv['paginate_data']['is_details'] = false;
        $dtv['paginate_data']['redirect'] = 'cms/contents';
        self::$dtv['nav_active']['active'] = 'contents';
        return view('cms.contents.contents_index', $dtv);
    }

    # create
    public function create()
    {
        self::$dtv['menu'] = Menu::all();
        self::$dtv['nav_active']['active'] = 'contents';
        return view('cms.contents.contents_create', self::$dtv);
    }
    
    public function store(ContentsRequest $request)
    {
        Content::SaveNew($request);
        return redirect('cms/contents');
    }
    
    # update
    public function edit(Request $request, $ctid)
    {
        self::$dtv['back_to_page'] = $request['back_to_page'];
        self::$dtv['menu'] = Menu::all();
        self::$dtv['content'] = Content::find($ctid);
        self::$dtv['nav_active']['active'] = 'contents';
        return view('cms.contents.contents_edit', self::$dtv);
    }

    public function update(ContentsRequest $request, $ctid)
    {
        Content::updateItem($request, $ctid);
        return redirect('cms/contents' . '?page=' . $request['back_to_page']);
    }

    # delete
    public function show(Request $request, $ctid)
    {
        self::$dtv['back_to_page'] = $request['back_to_page'];
        self::$dtv['content_id'] = $ctid;
        self::$dtv['nav_active']['active'] = 'contents';
        return view('cms.contents.contents_delete', self::$dtv);
    }

    public function destroy(Request $request, $ctid)
    {
        try{

            Content::destroy($ctid);
            Session::flash('warning', 'Item deleted successfully');

        }catch(Exception $error){

            Session::flash('error', 'An item linked to another item in the system cannot be deleted');
            
        }
        
        return redirect('cms/contents'. '?page=' . $request['back_to_page']);
    }
}
