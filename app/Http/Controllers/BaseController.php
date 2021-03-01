<?php

namespace App\Http\Controllers;
use App\Models\{HomeSlider, Stores, StoresCategory};

use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function index() {
        $sliders = HomeSlider::get();
        
        $stores_categories = StoresCategory::paginate(12);
        $view = $this->theme.'home';
        
        return view($view, compact('sliders', 'stores_categories'));   
    }

    public function stores($store_category)
    {
        $category   = StoresCategory::where('slug', $store_category)->first();
        $sliders    = HomeSlider::get();
        $stores     = Stores::with('owner')->where('hide', null)->where('category_id', $category->id)->paginate(12);
        $view       = $this->theme.'stores';
        
        return view($view, compact('sliders', 'stores'));   
    }
}
