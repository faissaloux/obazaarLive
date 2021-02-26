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
    public function index()
    {
        $user = \Auth::user();
        return view($this->mobile_theme.'account/profile', compact('user'));
    }

    public function edit()
    {
        $user = \Auth::user();
        return view($this->mobile_theme.'account/profile-edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user       = \Auth::user();
        $validator  = \Validator::make($request->all(), [
          'email'   => 'required|email|unique:users,email,'.$user->id, 
          'name'    => 'required|string|min:4',
          'phone'   => 'numeric'
        ]);

        if (!$validator->fails()) {
            $user->email    = $request->email;
            $user->name     = $request->name;
            if ($request->filled('phone')) {
                $user->phone = $request->phone;
            }
            $user->save();
            return redirect()->back()->with('success', trans('user.account.updated'));
        }
        return redirect()->back()->with('failed', trans('user.account.failed.updated')); 
    }
    
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
