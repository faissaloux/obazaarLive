<?php

use Illuminate\Support\Facades\Route;

/**
 * mobile.
 */

//Route::view('/',                        'mobile/intro'                                      );
Route::view('/login',                   'mobile/login'                                      )->name('login-view'            );
Route::post('/login',                   'MobileControllers\AccountController@userAuth'      )->name('login-auth'            );
Route::get('/logout',                   'Auth\LoginController@logout'                       )->name('logout'                );
Route::view('/register',                'mobile/register'                                   )->name('register-view'         );
Route::post('/registration',            'MobileControllers\AccountController@registration'  )->name('registration'          );
Route::view('/forget-password',         'mobile/forget-password'                            )->name('forget-password-view'  );
Route::post('/reset-password',          'MobileControllers\WebsiteController@forgetPassword')->name('forget-password'       );
Route::any('/reset_password/{token}',   'MobileControllers\WebsiteController@getPassword'   )->name('getPassword'           );
Route::post('/password/reset',          'MobileControllers\WebsiteController@resetPassword' )->name('password.request'      );
Route::get('/',                   'MobileControllers\BaseController@index'            )->name('stores'                );
Route::view('/orders',                  'mobile.orders'                                     )->name('orders'                );
Route::view('/thank-you',               'mobile/payment-success'                            )->name('thank-you'             );
Route::post('couponcheck',              'MobileControllers\PayementController@applyCoupon'  )->name('applyCoupon'           );

Route::group(['prefix' => '{store}', 'as' => 'store.', 'middleware' => 'store'], function(){
    Route::get('/search', 'MobileControllers\WebsiteController@searchProccessSubmit')->name('searchSubmit');
    Route::get('/category/{slug}', 'MobileControllers\WebsiteController@category')->name('category');
    
    Route::get('/',             'MobileControllers\WebsiteController@home'      );
    Route::get('/products',     'MobileControllers\WebsiteController@products'  )->name('products');
    Route::get('/product/{id}', 'MobileControllers\ShopController@product'      )->name('product');
    Route::get('/shipping/set/{id}', 'MobileControllers\WebsiteController@shipping_set')->name('shipping.set');
    Route::post('/shop/pay',        'MobileControllers\PayementController@checkout_pay')->name('checkout.pay');
    
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
            Route::get('/', 'MobileControllers\AdresseController@index')->name('index');    
            Route::get('/add', 'MobileControllers\AdresseController@create')->name('create');    
            Route::post('/store', 'MobileControllers\AdresseController@store')->name('add');    
            Route::get('/edit/{id}', 'MobileControllers\AdresseController@edit')->name('edit');      
            Route::post('/update/{id}', 'MobileControllers\AdresseController@update')->name('update');      
            Route::get('/delete/{id}', 'MobileControllers\AdresseController@delete')->name('delete');      
            Route::get('/default/{id}', 'MobileControllers\AdresseController@default')->name('default');
        });
        
        // add and remove product from wishlist
        Route::group(['prefix' => 'wishlist', 'as' => 'wishlist.'], function(){
            Route::get('/',          'MobileControllers\WebsiteController@wishlistList')->name('list'   );
            Route::get('/grid',          'MobileControllers\WebsiteController@wishlistGrid')->name('grid' );
            Route::get('/add/{id}',     'MobileControllers\WishlistController@add')->name('add'       );
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
            Route::view('/', \System::$ACTIVE_MOBILE_THEME_PATH.'/store/orders')->name('index');
            Route::get('/details/{id}', 'MobileControllers\AccountController@order_detail')->name('orders_detail');
        });

        Route::get('/checkout', 'MobileControllers\WebsiteController@checkout')->name('checkout');
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
        Route::view('/', \System::$ACTIVE_MOBILE_THEME_PATH.'/account.adresse')->name('adresses');
        Route::view('/add', \System::$ACTIVE_MOBILE_THEME_PATH.'/account.add_adresse')->name('add');
        Route::post('/add', 'MobileControllers\AccountController@shipping_create')->name('create');    
        Route::get('/edit/{id}', 'MobileControllers\AccountController@shipping_edit')->name('edit');      
        Route::post('/update/{id}', 'MobileControllers\AccountController@shipping_update')->name('update');      
        Route::get('/delete/{id}', 'MobileControllers\AccountController@shipping_delete')->name('delete');      
        Route::get('/default/{id}', 'MobileControllers\AccountController@shipping_default')->name('default');
    });
    
    // add and remove product from wishlist
    Route::group(['prefix' => 'wishlist', 'as' => 'wishlist.'], function(){
        Route::get('/',          'MobileControllers\WebsiteController@wishlistList')->name('list'   );
        Route::get('/grid',          'MobileControllers\WebsiteController@wishlistGridGlob')->name('grid'   );
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
        Route::view('/', \System::$ACTIVE_MOBILE_THEME_PATH.'/account.orders')->name('index');
        Route::get('/details/{id}', 'MobileControllers\AccountController@order_detail_account')->name('orders_detail');
    });
});