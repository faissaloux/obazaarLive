<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/mobile', 'as' => 'mobile.'], function(){
    Route::view('/', 'mobile/intro');
    Route::view('/login', 'mobile/login')->name('login-view');
    Route::view('/register', 'mobile/register')->name('register-view');
    Route::view('/forget-password', 'mobile/forget-password')->name('forget-password-view');
    Route::get('/', 'MobileControllers\BaseController@index');
});