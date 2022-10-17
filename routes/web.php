<?php

# cms  
Route::prefix('cms')->group(function(){
  
  Route::middleware(['cmsguard'])->group(function(){

    Route::get('dashboard', 'Cms\CmsController@dashboard');
    Route::get('toggle-manu-cms', 'Cms\CmsController@toggleManuCms');
    Route::get('orders', 'Cms\CmsController@orders');
    Route::get('orders/{oid}', 'Cms\CmsController@order');
    Route::resource('menu', 'Cms\MenuController');
    Route::resource('contents', 'Cms\ContentsController');
    Route::resource('categories', 'Cms\CategoriesController');
    Route::resource('products', 'Cms\ProductsController');
    Route::resource('users', 'Cms\UsersController');

  });

});

Route::middleware(['sessionwork'])->group(function(){

  Route::get('/', 'Site\PageController@home');

  # shop
  Route::prefix('shop')->group(function (){
    
    Route::get('/', 'Site\ShopController@categories');
    Route::get('cart', 'Site\ShopController@cart');
    Route::get('add-product-to-cart', 'Site\ShopController@addToCart');
    Route::get('clear-cart', 'Site\ShopController@clearCart');
    Route::get('delete-from-cart', 'Site\ShopController@deleteFromCart');
    Route::get('checkout', 'Site\ShopController@checkout');
    Route::get('{curl}', 'Site\ShopController@category');
    Route::get('{curl}/{purl}', 'Site\ShopController@product');
    
  });
  
  # user
  Route::prefix('user')->group(function(){
    
    Route::middleware(['userauth'])->group(function(){

      Route::get('signup', 'Site\UserController@signup');
      Route::post('signup', 'Site\UserController@postSignup');
      Route::get('signin', 'Site\UserController@signin');
      Route::post('signin', 'Site\UserController@postSignin');

    });
    
    Route::get('logout', 'Site\UserController@logout');
    
  });
  
  Route::get('{menu}', 'Site\PageController@dynamicMenu');

  Route::fallback('Site\ErrorsController@errors404');

});