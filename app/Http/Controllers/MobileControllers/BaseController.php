<?php

namespace App\Http\Controllers\MobileControllers;

use App\Models\Stores;
use App\Models\HomeSlider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    public function index()
    {
        $sliders = HomeSlider::get();
        $stores  = Stores::with('owner')->where('hide',null)->get();
        $view = $this->mobile_theme.'home';
        return view($view,compact('sliders','stores'));
    }
}