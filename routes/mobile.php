<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/mobile', 'as' => 'mobile.'], function(){
    Route::view('/', 'mobile/intro');
    Route::view('/login', 'mobile/login')->name('login-view');
    Route::view('/register', 'mobile/register')->name('register-view');
    Route::view('/forget-password', 'mobile/forget-password')->name('forget-password-view');
    Route::get('/stores', 'MobileControllers\BaseController@index');

    Route::group(['prefix' => '{store}', 'as' => 'store.', 'middleware' => 'store'], function(){
        Route::get('/', 'MobileControllers\WebsiteController@home');
        Route::get('/products', 'MobileControllers\WebsiteController@products')->name('products');
    });
});