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
        // TODO: display user info on profile edit page
        $user = \Auth::user();
        return view($this->mobile_theme.'profile-edit', compact('user'));
    }
}
