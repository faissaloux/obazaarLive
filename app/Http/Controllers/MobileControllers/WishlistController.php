<?php

namespace App\Http\Controllers\MobileControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WishList;
use Auth;

class WishlistController extends Controller
{
    //
    public function add($store,$id,Request $request) {
        if (Auth::check()) {
            $user_id = Auth::user()->id;
           $data = [ 'user_id' => $user_id, 'productID' => $id ];
          
           
           WishList::firstOrCreate($data);

           if($request->ajax()){
               return   WishList::where('user_id',$user_id)->count();
          }
           return redirect()->back()->with('success',trans('wishlist.added')); 
        }
         return view ($this->mobile_theme.'user');  
      }
}
