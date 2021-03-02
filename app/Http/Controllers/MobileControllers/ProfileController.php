<?php

namespace App\Http\Controllers\MobileControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = \Auth::user();
        return view($this->mobile_theme.'store/profile', compact('user'));
    }

    public function edit()
    {
        $user = \Auth::user();
        return view($this->mobile_theme.'store/profile-edit', compact('user'));
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

    public function password_index()
    {
        $user = \Auth::user();
        return view($this->mobile_theme.'store/password', compact('user'));
    }

    public function password_update(Request $request)
    {
        $user = $request->user();

        $rules = [
          'password'                => 'required|min:3',
          'newpassword'             => 'required|min:3',
          'password_confirmation'   => 'required|min:3',
        ];

        $customMessages = [
            'required' => 'wrong password'
        ];

        $request->validate($rules, $customMessages);

        if (!\Hash::check($request->password, $user->password)) {
            return redirect()->back()->with('error', trans('wrong password'));
        }


        if($request->newpassword == $request->password_confirmation ) {
          
                $user->password = \Hash::make($request->newpassword);
                $user->save();

            return redirect()->back()->with('success', trans('user.pwd.updated'));
        }

        return redirect()->back()->with('error','wrong password');
    }
}
