<?php

use Illuminate\Support\Facades\Route;

/**
 * mobile.
 */

Route::view('/',                'mobile/intro'                                  );
Route::view('/login',           'mobile/login'                                  )->name('login-view'            );
Route::post('/login',           'MobileControllers\AccountController@userAuth'  )->name('login-auth'            );
Route::get('/logout',           'Auth\LoginController@logout'                   )->name('logout');
Route::view('/register',        'mobile/register'                               )->name('register-view'         );
Route::view('/forget-password', 'mobile/forget-password'                        )->name('forget-password-view'  );
Route::get('/stores',           'MobileControllers\BaseController@index'        )->name('stores'                );
Route::view('/orders',          'mobile.orders'                                 )->name('orders'                );

Route::group(['prefix' => 'profile', 'as' => 'profile.'], function(){
    Route::get('/',             'MobileControllers\ProfileController@index'     )->name('index'                 );
    Route::get('/edit',         'MobileControllers\ProfileController@edit'      )->name('edit'                  );
});

Route::group(['prefix' => '{store}', 'as' => 'store.', 'middleware' => 'store'], function(){
    Route::get('/',             'MobileControllers\WebsiteController@home'      );
    Route::get('/products',     'MobileControllers\WebsiteController@products'  )->name('products'              );
    Route::get('/product/{id}', 'MobileControllers\ShopController@product'      )->name('product'               );
    
    // add and remove product from wishlist
    Route::group(['as' => 'wishlist.', 'middleware' => 'MAccount'], function(){
        Route::get('/wishlistList',          'MobileControllers\WebsiteController@wishlistList')->name('list'   );
        Route::get('/wishlistGrid',          'MobileControllers\WebsiteController@wishlistGrid')->name('grid'   );
        Route::get('/wishlist/add/{id}',     'MobileControllers\WishlistController@add')->name('add'            );
        Route::get('/wishlist/remove/{id}',  'MobileControllers\WishlistController@remove')->name('remove'      );
        Route::get('/wishlist/clear',        'MobileControllers\WishlistController@clear')->name('clear'        );
    });

    // add and remove product from wishlist
    Route::group(['as' => 'cart.'], function($store){
        Route::get('/cart/index', 'MobileControllers\CartController@index')->name('index');
        Route::any('/cart/add/{id}', 'MobileControllers\CartController@add')->name('add');
        Route::post('/cart/update', 'MobileControllers\CartController@update')->name('update');
        Route::get('/cart/remove/{id}', 'MobileControllers\CartController@remove')->name('remove');
    });
});

