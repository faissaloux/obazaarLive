<?php

namespace App\Http\Controllers;
use App\Models\{HomeSlider, Stores, StoresCategory};

use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function index() {
        $sliders = HomeSlider::get();
        $stores_categories = StoresCategory::paginate(12);
        $stores_with_no_category = Stores::whereNull('category_id')->whereNull('hide')->get();
        $view = $this->theme.'home';
        return view($view, compact('sliders', 'stores_categories', 'stores_with_no_category'));   
    }

    public function stores($store_category)
    {
        $category   = StoresCategory::where('slug', $store_category)->first();
        $sliders    = HomeSlider::get();
        $stores     = Stores::with('owner')->where('hide', null)->where('category_id', $category->id)->paginate(12);
        $view       = $this->theme.'stores';
        
        return view($view, compact('sliders', 'stores'));   
    }

    public function stores_default()
    {
        $sliders    = HomeSlider::get();
        $stores     = Stores::with('owner')->where('hide', null)->whereNull('category_id')->paginate(12);
        $view       = $this->theme.'stores';
        
        return view($view, compact('sliders', 'stores'));   
    }
}
