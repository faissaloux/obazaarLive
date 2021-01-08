<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{Page,Product,User,Orders};
 

class DashboardController extends Controller{



    public function home() {
    	$store    = \Auth::user()->store_id;
        $products = Product::where('store_id',$store)->count();
        $pages    = Page::count();
        $users    = User::count();
        $orders = Orders::where('store_id',$store)->count();
        $sales = Orders::where('store_id',$store)->where('statue','success')->count();
        $pending = Orders::where('store_id',$store)->where('statue','pending')->count();
        return view('admin.statique.home',compact('products','pages','users','orders','sales','pending'));
    }    

    

    







    

}
