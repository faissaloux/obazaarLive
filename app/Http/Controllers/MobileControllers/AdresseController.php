<?php

namespace App\Http\Controllers\MobileControllers;

use Illuminate\Http\Request;
use App\Models\Addresses;
use App\Models\{WishList,User};
use App\Http\Controllers\Controller;
use Auth;

class AdresseController extends Controller
{
    public function index()
    {
        return view($this->mobile_theme.'store/adresse');
    }

    public function create(){
        return view($this->mobile_theme.'store/add_adresse');
    }

    public function store(Request $request){
        $adresse = [
            'given_name'   => $request->given_name,
            'country_code' => $request->country_code,
            'street'       => $request->street,
            'state'        => $request->state,
            'housenumber'  => $request->housenumber,
            'city'         => $request->city,
            'postal_code'  => $request->postal_code,
            'phone'        => $request->phone,
            'user_id'      => Auth::user()->id,
        ];

        Addresses::create($adresse);

        return redirect()->route('mobile.store.adresses.index',['store' => \Session::get('store')])->with('success',trans('user.shipping.created'));
    }

    public function edit($store, $id) {
        $address = Addresses::find($id);
        return view ($this->mobile_theme.'store/update_adresse',compact('address'));   
    }

    public function update($store,$id,Request $request) {

            $address = Addresses::find($id);
            $address->given_name   = $request->given_name;
            $address->country_code = $request->country_code;
            $address->street       = $request->street;
            $address->state        = $request->state;
            $address->city         = $request->city;
            $address->housenumber  = $request->housenumber;
            $address->postal_code  = $request->postal_code;
            $address->phone        = $request->phone;
            $address->save();
            
            return redirect()->route('mobile.store.adresses.index',['store' => \Session::get('store')])->with('success',trans('user.shipping.updated'));
    }
    public function delete($store,$id) {
        Addresses::find($id)->delete();
        return redirect()->route('mobile.store.adresses.index',['store' => \Session::get('store')])->with('success',trans('user.shipping.removed'));
    }

    public function default($store,$id){
        $user_id   = Auth::user()->id;
        $shippping = Addresses::where('user_id',$user_id)->where('is_primary',true)->first();
        if($shippping) {
            $shippping->is_primary= false;
            $shippping->save();
        }
        $hop = Addresses::find($id);
        $hop->is_primary= true;
        $hop->save();
        return redirect()->route('mobile.store.adresses.index',['store' => \Session::get('store')])->with('success',trans('user.shipping.default'));
    }

    //global
    public function shipping_store(Request $request){
        $adresse = [
            'given_name'   => $request->given_name,
            'country_code' => $request->country_code,
            'street'       => $request->street,
            'state'        => $request->state,
            'housenumber'  => $request->housenumber,
            'city'         => $request->city,
            'postal_code'  => $request->postal_code,
            'phone'        => $request->phone,
            'user_id'      => Auth::user()->id,
        ];

        Addresses::create($adresse);

        return redirect()->route('mobile.account.adresses.index')->with('success',trans('user.shipping.created'));
    }

    public function shipping_edit($store, $id) {
        $address = Addresses::find($id);
        return view ($this->mobile_theme.'account/update_adresse',compact('address'));   
    }

    public function shipping_update($store,$id,Request $request) {

            $address = Addresses::find($id);
            $address->given_name   = $request->given_name;
            $address->country_code = $request->country_code;
            $address->street       = $request->street;
            $address->state        = $request->state;
            $address->city         = $request->city;
            $address->housenumber  = $request->housenumber;
            $address->postal_code  = $request->postal_code;
            $address->phone        = $request->phone;
            $address->save();
            
            return redirect()->route('mobile.account.adresses.index')->with('success',trans('user.shipping.updated'));
    }
    public function shipping_delete($store,$id) {
        Addresses::find($id)->delete();
        return redirect()->route('mobile.account.adresses.index')->with('success',trans('user.shipping.removed'));
    }

    public function shipping_default($store,$id){
        $user_id   = Auth::user()->id;
        $shippping = Addresses::where('user_id',$user_id)->where('is_primary',true)->first();
        if($shippping) {
            $shippping->is_primary= false;
            $shippping->save();
        }
        $hop = Addresses::find($id);
        $hop->is_primary= true;
        $hop->save();
        return redirect()->route('mobile.account.adresses.index')->with('success',trans('user.shipping.default'));
    }
    
}