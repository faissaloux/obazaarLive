<?php

namespace App\Http\Controllers\MobileControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WishList;
use Auth;

class WishlistController extends Controller
{
    //add
    public function add(Request $request, $store_category, $store,$id) {
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $data = [ 'user_id' => $user_id, 'productID' => $id ];
            
            
            WishList::firstOrCreate($data);

            if($request->ajax()){
                return   WishList::where('user_id',$user_id)->count();
            }
            return redirect()->back()->with('success',trans('wishlist.added')); 
        }
        return view ($this->mobile_theme.'login-view');  
    }

    //remove
    public function remove(Request $request, $store_category, $store,$id){
        $wish = WishList::find($id);
        if($wish){
            $wish->delete();
            return redirect()->back()->with('success',trans('wishlist.removed'));   
        }
        
        return redirect()->back();   
    }

    //clear
    public function clear(Request $request, $store_category, $store) {
        $user = Auth::user();
        $user->wishlist->each->delete();
        return redirect()->route('mobile.store.wishlist.grid',['store' => $store, 'store_category', $store_category ])->with('success',trans('wishlist.cleared'));   
    }
}