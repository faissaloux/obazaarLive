<?php

namespace App\Http\Controllers\Manager;
use \App\Http\Controllers\Controller;
use App\Models\{Stores , StoresCategory, User};
use Illuminate\Http\Request;
use App\Helpers\StoresHelper;

class ManagerStoresController extends Controller {
   

    public function index() {
        $stores = Stores::orderby('id','desc')->paginate(10);
        return view('manager.store.index',compact('stores'));  
    }

    public function deactivate(Request $request,$id) {        
        $store = Stores::find($id);
        $store->hide = 1;
        $store->save();
        return redirect()->route('manager.stores.home')->with('success',trans('store.updated'));
    }

    public function activate(Request $request,$id) {
        $store = Stores::find($id);
        $store->hide = NULL;
        $store->save();
        return redirect()->route('manager.stores.home')->with('success',trans('store.updated'));
    }

   
    public function create() {
        $directories = StoresCategory::get();
        return view('manager.store.create', compact('directories'));
    
    }

    public function store(Request $request) {
        $rules = [
          'email'       => 'required|email|unique:users', 
          'name'        => 'required|string|min:4',
          'phone'       => 'required',
          'storename'   => 'required',
          'url'         => 'required',
          'street'      => 'required',
          'postalcode'  => 'required',
          'description' => 'required',
        ];


        if( \Request::route()->getName() != 'join.merchant') {
            $rules['password'] = 'required|min:3';
        }else {
                $request->password = 123456;
        }


        $messages = [
            'storename.required'=> trans("storename.required"),
            'email.required'    => trans("email.required"),
            'email.email'       => trans("email.unique"),
            'email.unique'      => trans("name.required"),
            'password.required' => trans("password.required"),
            'password.min'      => trans("password.min"),
            'name.required'     => trans("name.required"),
            'phone.required'    => trans("phone.required"),
            'storename.required'   => trans("storename.required"),
            'url.required'         => trans("url.required"),
            'street.required'      => trans("street.required"),
            'postalcode.required'  => trans("postalcode.required"),
            'description.required' => trans("description.required"),
            'latitude.required'    => trans("latitude.required"),
        ];

        $request->validate($rules,$messages);

        StoresHelper::save($request);



        if( \Request::route()->getName() == 'join.merchant') {
            return \Redirect::back()->with('success',trans('store.created'));
        }

        return redirect()->route('manager.stores.home')->with('success',trans('store.created'));
    }

  
    public function edit($id) {
        $content        = Stores::find($id);
        $directories    = StoresCategory::get();
        return view('manager.store.edit',compact('content', 'directories'));
    }

    
    public function update(Request $request, $id)  {
        StoresHelper::update($request,$id);
        return redirect()->route('manager.stores.home')->with('success',trans('store.updated'));
    }

    
    public function delete($id) {
        $content = Stores::find($id);

        // remove the user from the store
        
        $owner = User::find($content->user_id);
        if($owner){
        $owner->store_id = NULL;
            
        $owner->save();
        }

        $content->delete();
        return redirect()->route('manager.stores.home')->with('success',trans('store.deleted'));
    }


}
