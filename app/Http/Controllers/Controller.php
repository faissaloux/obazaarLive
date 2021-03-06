<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Session;
use Auth;

class Controller extends BaseController
{

    public $theme ;
    public $mobile_theme;

    public $langs = ['ar' => 'العربية' ,'en'  => 'English' ,'de'  => 'Deutsch' ,'tr'  => 'Turkish'];


    public function __construct(){
        $this->theme        = \System::$ACTIVE_THEME_PATH.'/';
        $this->mobile_theme = \System::$ACTIVE_MOBILE_THEME_PATH.'/';
        //dd(\Session::get('store'));
    }

    
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function success($message){
    	return session::flash('success',$message);
    }
    public function error($message){
    	return session::flash('error',$message);
    }


    	

	public function checkUserAuth() {
		$store          = Session::get('store');
        $store_category = Session::get('store_category');
	    if(!Auth::check()){
    		return redirect()->route('user', ['store' =>$store, 'store_category' => $store_category ]);
     	}
    }


}