<?php

use Illuminate\Support\Facades\Route;

/**
 * mobile.
 */

Route::view('/',                'mobile/intro'                                  );
Route::view('/login',           'mobile/login'                                  )->name('login-view'            );
Route::post('/login',           'MobileControllers\AccountController@userAuth'  )->name('login-auth'            );
Route::view('/register',        'mobile/register'                               )->name('register-view'         );
Route::view('/forget-password', 'mobile/forget-password'                        )->name('forget-password-view'  );
Route::get('/stores',           'MobileControllers\BaseController@index'        );

Route::group(['prefix' => '{store}', 'as' => 'store.', 'middleware' => 'store'], function(){
    Route::get('/',             'MobileControllers\WebsiteController@home'      );
    Route::get('/products',     'MobileControllers\WebsiteController@products'  )->name('products'              );
    Route::get('/product/{id}', 'MobileControllers\ShopController@product'      )->name('product'               );
    
    // add and remove product from wishlist
    Route::group(['as' => 'wishlist.'], function(){
        Route::get('/wishlist/add/{id}', 'MobileControllers\WishlistController@add')->name('add'              );
    });
});

