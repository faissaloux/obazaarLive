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

<<<<<<< HEAD
=======
Route::group(['prefix' => 'profile', 'as' => 'profile.'], function(){
    Route::get('/',             'MobileControllers\ProfileController@index'     )->name('index'                 );
    Route::get('/edit',         'MobileControllers\ProfileController@edit'      )->name('edit'                  );
    Route::post('/update',      'MobileControllers\ProfileController@update'    )->name('update'                );
});

>>>>>>> d9779001bc6547e46f8851c4aeca0d3442b0d40c
Route::group(['prefix' => '{store}', 'as' => 'store.', 'middleware' => 'store'], function(){
    Route::get('/',             'MobileControllers\WebsiteController@home'      );
    Route::get('/products',     'MobileControllers\WebsiteController@products'  )->name('products');
    Route::get('/product/{id}', 'MobileControllers\ShopController@product'      )->name('product');
    
    Route::group(['prefix' => 'account', 'middleware' => 'MAccount'], function(){    
        // Profile
        Route::group(['prefix' => 'profile','as' => 'profile.'], function(){
            Route::view('/', \System::$ACTIVE_MOBILE_THEME_PATH.'/account.edit')->name('index');
            Route::post('/update', 'AccountController@update_profile')->name('update');
            Route::view('/password', \System::$ACTIVE_MOBILE_THEME_PATH.'/account.password')->name('password');
            Route::post('/password/update', 'AccountController@password_update')->name('password.update');
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
        Route::group(['prefix' => 'wishlist','as' => 'wishlist.'], function(){
            Route::get('/',          'MobileControllers\AccountController@wishlistList')->name('list');
            Route::get('/grid',          'MobileControllers\AccountController@wishlistGrid')->name('grid'   );
            Route::get('/add/{id}',     'MobileControllers\AccountController@add_wishlist')->name('add'            );
            Route::get('/remove/{id}',  'MobileControllers\AccountController@remove_wishlist')->name('remove'      );
            Route::get('/clear',        'MobileControllers\AccountController@clear_wishlist')->name('clear'        );
        });
    
        // list and remove product from cart
        Route::group(['prefix' => 'cart','as' => 'cart.'], function(){
            Route::get('/index', 'MobileControllers\AccountController@cart')->name('index');
            Route::any('/add/{id}', 'MobileControllers\AccountController@add_cart')->name('add');
            Route::post('/update', 'MobileControllers\AccountController@update_cart')->name('update');
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
        Route::view('/', \System::$ACTIVE_MOBILE_THEME_PATH.'/account.edit')->name('index');
        Route::post('/update', 'AccountController@update_profile')->name('update');
        Route::view('/password', \System::$ACTIVE_MOBILE_THEME_PATH.'/account.password')->name('password');
        Route::post('/password/update', 'AccountController@password_update')->name('password.update');
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
    Route::group(['prefix' => 'wishlist','as' => 'wishlist.'], function(){
        Route::get('/',          'MobileControllers\AccountController@wishlistList')->name('list'   );
        Route::get('/grid',          'MobileControllers\AccountController@wishlistGrid')->name('grid'   );
        Route::get('/add/{id}',     'MobileControllers\AccountController@add_wishlist')->name('add'            );
        Route::get('/remove/{id}',  'MobileControllers\AccountController@remove_wishlist')->name('remove'      );
        Route::get('/clear',        'MobileControllers\AccountController@clear_wishlist')->name('clear'        );
    });

    // list and remove product from cart
    Route::group(['prefix' => 'cart','as' => 'cart.'], function(){
        Route::get('/index', 'MobileControllers\AccountController@cart')->name('index');
        Route::any('/add/{id}', 'MobileControllers\AccountController@add_cart')->name('add');
        Route::post('/update', 'MobileControllers\AccountController@update_cart')->name('update');
    });

    // all orders and order detail
    Route::group(['prefix' => 'orders','as' => 'orders.'], function(){
        Route::view('/', \System::$ACTIVE_MOBILE_THEME_PATH.'/account.orders')->name('orders');
        Route::get('/details/{id}', 'AccountController@order_detail')->name('orders_detail');
    });
});