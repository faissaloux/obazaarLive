<?php

namespace App\Http\Controllers\MobileControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{WishList,User};
use App;
use Session;
use Auth;
use \Carbon\Carbon;
use \App\Helpers\EmailHelper;

class AccountController extends Controller
{
    //Login
    public function  userAuth(Request $request) {

        if(!$request->filled('username') and !$request->filled('password') ){
            return redirect()->route('mobile.login-view')->with('error',trans('user.wrong.auth'));
        }

        $username = $request->username;
        $password = $request->password;

        if (Auth::attempt(['email' => $username, 'password' => $password])){
            $id_user = Auth::user()->id;
            $lastlogin = User::find($id_user);
            $lastlogin->last_login = Carbon::now();
            $lastlogin->save(); 

            return redirect('/stores');   
        }

        else {    
             
             return redirect()->route('mobile.login-view')->with('error',trans('user.wrong.auth'));
        } 
        
    }
}
