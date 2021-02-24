<?php

namespace App\Http\Controllers\MobileControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Product;
use \App\Helpers\Cart;
use Response;


class CartController extends Controller
{
    
    //index
    public function index() {
        $cart = (new Cart())->get();
        $total = (new Cart())->total();
        // return view ('website/cart',compact('cart','total'));
        dd($cart);
    }


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
