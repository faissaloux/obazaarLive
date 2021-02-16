<?php

namespace App\Http\Controllers\MobileControllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Helpers\ProductHelper;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    public function product($store, $id) {
        if(is_numeric($id)){
            $product = Product::find($id);
        }
        else {
            $langs = ProductHelper::$langs;
            $lang = \App::getLocale();
            $product = Product::where('slug->'.$lang, $id)->first();
            if(!$product){
                foreach($langs as $key => $lang){
                    if($product = Product::where('slug->'.$key, $id)->first()) break;
                }
            }
        }

        $related = Product::where('categoryID', $product->categoryID)->take(7)->get();

        if(!$related) {
            $related = Product::all()->random(7);
        }
        
        return view($this->mobile_theme.'single-product',compact('product','related','reviews','wishlist'));     
    }
}
