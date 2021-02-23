<?php

namespace App\Http\Controllers\MobileControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\
{
    Product, Slider, BasePages, Stores, WishList
};

class WebsiteController extends Controller
{
    public function home(Request $request)
    {
        if (!\Session::has('store_id'))
        {
            $page = BasePages::where('slug', $request->store)->first();

            if (!$page)
            {
                abort(404);
            }
            else
            {
                return view($this->theme . 'home', compact('page'));
            }

        }
        else
        {
            $id         = Stores::where('slug', $request->store)->first()->id;
            $products   = Product::where('store_id', $id)->where('active', 1)->paginate(12);
            $sliders    = Slider::Merchant()->get();
            
            return view($this->mobile_theme . 'store', compact('products', 'sliders'));
        }
    }

    public function products(Request $request)
    {
        if (!\Session::has('store_id'))
        {

            $page = BasePages::where('slug', $request->store)->first();

            if (!$page)
            {
                abort(404);
            }
            else
            {

                return view($this->theme . 'home', compact('page'));
            }

        }
        else
        {
            $id             = Stores::where('slug', $request->store)->first()->id;
            $products       = Product::where('store_id', $id)->where('active', 1)->get();
            
            return view($this->mobile_theme . 'shop-grid', compact('products'));
        }
    }

    public function wishlistList()
    {
        $wishlist = WishList::currentuser()->paginate(5);
        return view($this->mobile_theme . 'wishlist-list', compact('wishlist'));
    }
    public function wishlistGrid()
    {
        $wishlist = WishList::currentuser()->paginate(5);
        return view($this->mobile_theme . 'wishlist-grid', compact('wishlist'));
    }
}
