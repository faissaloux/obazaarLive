<?php

namespace App\Http\Controllers\MobileControllers;

use App\Models\Stores;
use App\Models\HomeSlider;
use Illuminate\Http\Request;
use App\Models\StoresCategory;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    public function index()
    {
        $sliders = HomeSlider::get();
        $stores_categories = StoresCategory::paginate(12);
        $view = $this->mobile_theme.'home';
        return view($view,compact('sliders','stores_categories'));
    }

    public function stores($store_category)
    {
        $category   = StoresCategory::where('slug', $store_category)->first();
        $sliders    = HomeSlider::get();
        $stores     = Stores::with('owner')->where('hide', null)->where('category_id', $category->id)->paginate(12);
        $view       = $this->mobile_theme.'stores';
        
        return view($view, compact('sliders', 'stores'));   
    }

    public function stores_default()
    {
        $sliders    = HomeSlider::get();
        $stores     = Stores::with('owner')->where('hide', null)->whereNull('category_id')->paginate(12);
        $view       = $this->mobile_theme.'stores';
        
        return view($view, compact('sliders', 'stores'));   
    }
}