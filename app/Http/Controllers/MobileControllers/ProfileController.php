<?php

namespace App\Http\Controllers\MobileControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = \Auth::user();
        return view($this->mobile_theme.'profile', compact('user'));
    }

    public function edit()
    {
        $user = \Auth::user();
        return view($this->mobile_theme.'profile-edit', compact('user'));
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
}
