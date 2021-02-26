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

Route::group(['prefix' => '{store}', 'as' => 'store.', 'middleware' => 'store'], function(){
    Route::get('/',             'MobileControllers\WebsiteController@home'      );
    Route::get('/products',     'MobileControllers\WebsiteController@products'  )->name('products');
    Route::get('/product/{id}', 'MobileControllers\ShopController@product'      )->name('product');
    
    Route::group(['prefix' => 'account', 'middleware' => 'MAccount'], function(){    
        // Profile
        Route::group(['prefix' => 'profile','as' => 'profile.'], function(){
            Route::get('/',             'MobileControllers\ProfileController@index'     )->name('index'                 );
            Route::get('/edit',         'MobileControllers\ProfileController@edit'      )->name('edit'                  );
            Route::post('/update',      'MobileControllers\ProfileController@update'    )->name('update'                );
            Route::get('/password',     'MobileControllers\ProfileController@password_index')->name('password.index');
            Route::post('/password/update', 'MobileControllers\ProfileController@password_update')->name('password.update');
        });
    
        // add and remove addresses
        Route::group(['prefix' => 'adresses','as' => 'adresses.'], function(){
            Route::view('/', \System::$ACTIVE_MOBILE_THEME_PATH.'/account.adresses')->name('adresses');
            Route::view('/add', \System::$ACTIVE_MOBILE_THEME_PATH.'/account.shipping_add')->name('add');
            Route::post('/add', 'MobileControllers\AccountController@shipping_store')->name('add');    
            Route::get('/edit/{id}', 'MobileControllers\AccountController@edit_shipping')->name('edit');      
            Route::post('/update/{id}', 'MobileControllers\AccountController@update_shipping')->name('update');      
            Route::get('/delete/{id}', 'MobileControllers\AccountController@shipping_delete')->name('delete');      
            Route::get('/default/{id}', 'MobileControllers\AccountController@shipping_default')->name('default');
        });
        
        // add and remove product from wishlist
        Route::group(['prefix' => 'wishlist', 'as' => 'wishlist.'], function(){
            Route::get('/',          'MobileControllers\WebsiteController@wishlistList')->name('list'   );
            Route::get('/grid',          'MobileControllers\WebsiteController@wishlistGrid')->name('grid'   );
            Route::get('/add/{id}',     'MobileControllers\WishlistController@add')->name('add'            );
            Route::get('/remove/{id}',  'MobileControllers\WishlistController@remove')->name('remove'      );
            Route::get('/clear',        'MobileControllers\WishlistController@clear')->name('clear'        );
        });
    
        // add and remove product from cart
        Route::group(['prefix' => 'cart', 'as' => 'cart.'], function(){
            Route::get('index', 'MobileControllers\CartController@index')->name('index');
            Route::any('add/{id}', 'MobileControllers\CartController@add')->name('add');
            Route::post('update', 'MobileControllers\CartController@update')->name('update');
            Route::get('remove/{id}/{product_id}', 'MobileControllers\CartController@remove')->name('remove');
        });
    
        // all orders and order detail
        Route::group(['prefix' => 'orders','as' => 'orders.'], function(){
            Route::view('/', \System::$ACTIVE_MOBILE_THEME_PATH.'/account.orders')->name('orders');
            Route::get('/details/{id}', 'AccountController@order_detail')->name('orders_detail');
        });
    });
});

Route::group(['prefix' => 'account', 'as' => 'account.', 'middleware' => 'MAccount'], function(){    
    // Profile
    Route::group(['prefix' => 'profile','as' => 'profile.'], function(){
        Route::get('/',             'MobileControllers\AccountController@index'     )->name('index'                 );
        Route::get('/edit',         'MobileControllers\AccountController@edit'      )->name('edit'                  );
        Route::post('/update',      'MobileControllers\AccountController@update'    )->name('update'                );
        Route::get('/password',     'MobileControllers\AccountController@password_index')->name('password.index');
        Route::post('/password/update', 'MobileControllers\AccountController@password_update')->name('password.update');
    });

    // add and remove addresses
    Route::group(['prefix' => 'adresses','as' => 'adresses.'], function(){
        Route::view('/', \System::$ACTIVE_MOBILE_THEME_PATH.'/account.adresses')->name('adresses');
        Route::view('/add', \System::$ACTIVE_MOBILE_THEME_PATH.'/account.shipping_add')->name('add');
        Route::post('/add', 'MobileControllers\AccountController@shipping_store')->name('add');    
        Route::get('/edit/{id}', 'MobileControllers\AccountController@edit_shipping')->name('edit');      
        Route::post('/update/{id}', 'MobileControllers\AccountController@update_shipping')->name('update');      
        Route::get('/delete/{id}', 'MobileControllers\AccountController@shipping_delete')->name('delete');      
        Route::get('/default/{id}', 'MobileControllers\AccountController@shipping_default')->name('default');
    });
    
    // add and remove product from wishlist
    Route::group(['prefix' => 'wishlist', 'as' => 'wishlist.'], function(){
        Route::get('/',          'MobileControllers\WebsiteController@wishlistList')->name('list'   );
        Route::get('/grid',          'MobileControllers\WebsiteController@wishlistGrid')->name('grid'   );
        Route::get('/add/{id}',     'MobileControllers\WishlistController@add')->name('add'            );
        Route::get('/remove/{id}',  'MobileControllers\WishlistController@remove')->name('remove'      );
        Route::get('/clear',        'MobileControllers\WishlistController@clear')->name('clear'        );
    });

    // add and remove product from cart
    Route::group(['prefix' => 'cart', 'as' => 'cart.'], function(){
        Route::get('index', 'MobileControllers\CartController@index')->name('index');
        Route::any('add/{id}', 'MobileControllers\CartController@add')->name('add');
        Route::post('update', 'MobileControllers\CartController@update')->name('update');
        Route::get('remove/{id}/{product_id}', 'MobileControllers\CartController@remove')->name('remove');
    });

    // all orders and order detail
    Route::group(['prefix' => 'orders','as' => 'orders.'], function(){
        Route::view('/', \System::$ACTIVE_MOBILE_THEME_PATH.'/account.orders')->name('orders');
        Route::get('/details/{id}', 'AccountController@order_detail')->name('orders_detail');
    });
});