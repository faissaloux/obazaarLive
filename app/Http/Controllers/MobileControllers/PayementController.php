<?php

namespace App\Http\Controllers\MobileControllers;

use ShoppingCart;
use App\Models\Orders;
use App\Models\Stores;
use App\Models\Coupons;
use App\Models\Options;
use App\Models\Payement;
use App\Models\Shipping;
use App\Models\Addresses;
use Illuminate\Http\Request;
use App\Helpers\OrdersHelper;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\StripeController;
use hisorange\BrowserDetect\Parser as Browser;

class PayementController extends Controller
{
    public function checkout_pay(Request $request)
    {
        if(!\System::shoppingCartIsNotEmpty()){
            return redirect()->back()->with('error', trans('Your shopping cart is empty'));
        }
        \Session::forget('error');

    	// check if the user has adress
    	$user_id = \Auth::user()->id;
        $address = Addresses::where('user_id',$user_id)->where('is_shipping',true)->first();

        if(!$address){
        	return redirect()->back()->with('error', trans('please select shipping address first'));
        }

        $lang     = \App::getLocale();
        $store_id = Stores::where('slug', $request->store)->first()->id;
        $currency = Options::where('lang', $lang)->where('store_id', $store_id)->where('key', 'currency')->first();
        
    	if(!$currency){
    		$currency = 'EUR'; 
    	}else {
            $currency = $currency->currency; 
        }
    	
    	\Session::put('shippingMethod', $request->shippingMethod);
    	\Session::put('store_id', $store_id);
    	\Session::put('currency', $currency);

    	if(!$request->has('paymentmethod')){
    		return redirect()->back()->with('error', trans('please select payment method'));   
    	}

    	if($request->has('paymentmethod') and $request->paymentmethod == 'paypal'){
			return	(new PayPalController())->pay($request);
		}

    	if($request->has('paymentmethod') and $request->paymentmethod == 'stripe'){
			return	(new StripeController())->postPaymentWithStripe($request);
		}

    	if($request->has('paymentmethod') and $request->paymentmethod == 'facture'){
            $SubtotalPrice  = ShoppingCart::totalPrice();
			$order_id       = OrdersHelper::save();
              
            $data = [
                'order_id' => $order_id ,
                'method' => 'facture',
            ];
           
            $coupon         = $request->coupon;
            $discount       = Coupons::where('code', $coupon)->first();
            $discountPrice  = 0;        

            $shippingPrice  = 0;
            $shippingid     = $request->shippingMethod;

            $shipping       = Shipping::find($shippingid);

            if($shipping) {
                $shippingPrice =  (float)str_replace('€', '', $shipping->cost);
            }

            if($discount){
                $discountPrice = $discount->discount;
                if($discount->discount_type == 'percent'){
                    $total = $shippingPrice + $SubtotalPrice - (($shippingPrice + $SubtotalPrice)*$discountPrice)/100;
                }
            }
            else{
                $total = $shippingPrice + $SubtotalPrice - $discountPrice;
            }

            $this->serial = OrdersHelper::generate_booking_id();
            \Session::put('order_serial', $this->serial);

            $payement           = Payement::create($data);

            $order              = Orders::find($order_id);
            $order->payement_id = $payement->id;
            $order->statue      = 'pending';
            $order->shipping_id = $shippingid;
            $order->total       = round($total, 2);
            $order->serial      = $this->serial;

            $geo = geoip(\Request::ip());

            $order->device      = Browser::browserFamily();
            $order->ip          = $geo['ip'];
            $order->country     = $geo['country'];
            $order->platform    = Browser::platformName();

            $order->save();                     

            WebsiteController::send_alert($order->id);

			return redirect()->route('thank-you')->with('message','order created successfully');
		}
    }

    public function  applyCoupon(Request $request)
    {
        $coupon = $request->coupon;
        $total = $request->total;
        $check = Coupons::where('code', $coupon)->first();
        if ($check){
            \Session::put('coupon', [
                'name' => $check->coupon,
                'discount' => $check->discount,
            ]);

            $notification=array(
                'message'=>'Coupon applied!',
                'alert-type'=>'success'
            );

            if($check->statue == 'active'){
                $type = $check->discount_type;
                $discount = $check->discount;
                return   response()->json(['success'=>true, 'type'=>$type, 'discount'=>$discount, 'notification'=>'Coupon applied!' ]);
            }
        }
        else{
            $notification=array(
                'message'=>'Invalid Coupon!',
                'alert-type'=>'error'
            );
            return response()->json(['success'=>false, 'notification'=>trans('Invalid Coupon!') ]);
        }
    }
}
