<?php

namespace App\Http\Controllers;

use App\Helpers\ProductHelper;
use App\Models\FileManager;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategories;
class ShopController extends Controller {

    
    public function index() {
        $id = \Session::get('store_id');
        $categories = ProductCategories::where('lang', \App::getLocale())
                                        ->where('store_id', $id)
                                        ->withCount(['products' => function($query){
                                            $query->where('active', 1);
                                        }])->get();

        $products = Product::Merchant()->paginate(12);
        return view($this->theme.'shop',compact('products', 'categories'));
    }

    public function product($store_category, $store, $id) {
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
        
        return view($this->theme.'product',compact('product','related','reviews','wishlist'));     
    }

    public function quickview($store,$id) {

        if(is_numeric($id)){
            $product = Product::find($id);
        }
        else {
            $lang = \App::getLocale();
            $product = Product::where('slug->'.$lang, $id)->first();
        }
        
        $related = Product::where('categoryID', $product->categoryID)->get();

        if(!$related) {
            $related = Product::all()->random(7);;
        }

        return view($this->theme.'elements.quickview',compact('product','related','reviews','wishlist'));     
    }

}
