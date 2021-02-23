<?php

namespace App\Http\Controllers\MobileControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Product;
use \App\Helpers\Cart;

class CartController extends Controller
{
    //add
    public function add($store,$id,Request $request) {
		$quantity = $request->quantity;
        (new Cart())->add($id,$quantity); 
        
        if($request->ajax()){
            
            return response()->json(["success" => "Product added to cart successfully"]);
        }
        return redirect()->route('mobile.store.cart',compact('store'))->with('message',trans('cart.added'));
    }
}
