<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductsRequest;
use Illuminate\Database\QueryException;
use App\Models\Product, 
    Session,
    App\Models\Categorie;

class ProductsController extends CmsMainController
{

    # read
    public function index()
    {
        $dtv =& self::$dtv;
        $dtv['products'] = Product::getProducts();
        $dtv['paginate_data'] = $this->createPaginateData($dtv['products'], 'cms/products');
        if(is_object($dtv['paginate_data'])) return $dtv['paginate_data'];
        $dtv['paginate_data']['is_details'] = false;
        $dtv['paginate_data']['redirect'] = 'cms/products';
        $dtv['nav_active']['active'] = 'products';
        return view('cms.products.products_index', $dtv);
    }

    # create
    public function create()
    {
        self::$dtv['categories'] = Categorie::all(['id', 'title']);
        self::$dtv['nav_active']['active'] = 'products';
        return view('cms.products.products_create', self::$dtv);
    }
    
    public function store(ProductsRequest $request)
    {
        Product::SaveNew($request);
        return redirect('cms/products');
    }
    
    # update
    public function edit(Request $request, $pid)
    {
        
        $dtv =& self::$dtv;

        $dtv['back_to_page'] = $request['back_to_page'];
        $dtv['categories'] = Categorie::all(['id', 'title']);
        $dtv['product'] = Product::find($pid);
        $dtv['nav_active']['active'] = 'products';
        return view('cms.products.products_edit', self::$dtv);
    }

    public function update(ProductsRequest $request, $pid)
    {
        Product::updateItem($request, $pid);
        return redirect('cms/products' . '?page=' . $request['back_to_page']);
    }

    # delete
    public function show(Request $request, $pid)
    {
        self::$dtv['back_to_page'] = $request['back_to_page'];
        self::$dtv['product_id'] = $pid;
        self::$dtv['nav_active']['active'] = 'products';
        return view('cms.products.products_delete', self::$dtv);
    }

    public function destroy(Request $request, $pid)
    {
        try{

            Product::destroy($pid);
            Session::flash('warning', 'Item deleted successfully');

        }catch(QueryException $error){

            Session::flash('error', 'An item linked to another item in the system cannot be deleted');
            
        }
        
        return redirect('cms/products' . '?page=' . $request['back_to_page']);
    }
}
