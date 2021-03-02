<?php

namespace App\Http\Controllers;
use Srmklive\PayPal\Services\ExpressCheckout;
use Illuminate\Http\Request;
use App\Models\{Payement, Addresses, Stores ,Options , Orders ,User,Coupons , Shipping };
use App\Helpers\OrdersHelper;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\StripeController;
use hisorange\BrowserDetect\Parser as Browser;
use ShoppingCart;
use Session;
use Auth;
use App;
use Illuminate\Support\Facades\Mail;

class PayementController extends Controller {


    protected $provider;
    public $serial = '';

	public function __construct() {
        $this->provider = new ExpressCheckout();
        
	}


    public function checkout_pay(Request $request) {

        if(!\System::shoppingCartIsNotEmpty()){
            return redirect()->back()->with('error', trans('Your shopping cart is empty'));
        }




        Session::forget('error');

    	// check if the user has adress
    	$user_id = Auth::user()->id;
        $address = Addresses::where('user_id',$user_id)->where('is_shipping',true)->first();

        if(!$address){
        	return redirect()->back()->with('error', trans('please select shipping address first'));
        }

        $lang     = App::getLocale();
        $store_id = Stores::where('slug',$request->store)->first()->id;
        $currency = Options::where('lang',$lang)->where('store_id',$store_id)->where('key','currency')->first();
        
    	if(!$currency){
    		$currency = 'EUR'; 
    	}else {
            $currency = $currency->currency; 
        }
    	

    	Session::put('shippingMethod',$request->shippingMethod);
    	Session::put('store_id',$store_id);
    	Session::put('currency',$currency);


    	if(!$request->has('paymentmethod')){
    		return redirect()->route('checkout',['store'=> $request->store])->with('error', trans('please select payment method'));   
    	}

    	if($request->has('paymentmethod') and $request->paymentmethod == 'paypal'){
			return	(new PayPalController())->pay($request);
		}


    	if($request->has('paymentmethod') and $request->paymentmethod == 'stripe'){
			return	(new StripeController())->postPaymentWithStripe($request);
		}


    	if($request->has('paymentmethod') and $request->paymentmethod == 'facture'){
            $SubtotalPrice = ShoppingCart::totalPrice();
			$order_id = OrdersHelper::save();
              
            $data = [
                'order_id' => $order_id ,
                'method' => 'facture',
            ];            

           
            $coupon = $request->coupon;
            $discount = Coupons::where('code', $coupon)->first();
            $discountPrice=0;        
            

            $shippingPrice = 0;
            $shippingid = $request->shippingMethod;
            $shipping = Shipping::find($shippingid);
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
            Session::put('order_serial', $this->serial);

            $payement           = Payement::create($data);

            $order              = Orders::find($order_id);
            $order->payement_id = $payement->id;
            $order->statue      = 'pending';
            $order->shipping_id = $shippingid;
            $order->total       = round($total, 2);
            $order->serial      = $this->serial;

            
            $geo = geoip(\Request::ip());

            $order->device = Browser::browserFamily();
            $order->ip = $geo['ip'];
            $order->country = $geo['country'];
            $order->platform = Browser::platformName();


            $order->save();

            $content = $order;                        

            WebsiteController::send_alert($order->id);



        $url = 'https://api.elasticemail.com/v2/email/send';
        /*try{
                $post = array('from' => 'contact@o-bazaar.com',
                'fromName' => 'O-Bazaar',
                'apikey' => '9ECAE3B0E7E28B94621D30D634B0238ACC12BE45DA5CC17DEC385C99EE08C9212403CDE46FE482701696293D221895D8',
                'subject' => 'Neue Ordnung',
                'to' => $order->user->email,
                'bodyHtml' => view("email", compact('content')),
                'isTransactional' => false);

                $ch = curl_init();
                curl_setopt_array($ch, array(
                    CURLOPT_URL => $url,
                    CURLOPT_POST => true,
                    CURLOPT_POSTFIELDS => $post,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_HEADER => false,
                    CURLOPT_SSL_VERIFYPEER => false
                ));

                $result=curl_exec ($ch);
                curl_close ($ch);

                print_r($result);

        }
        catch(Exception $ex){
            echo $ex->getMessage();
        }*/


        // email data
        $email_data = array(
            'order' => $order,
            'email' => $order->user->email
        );
        
        // send email with the template
        // Mail::send('emails.orderCreated', $email_data, function ($message) use ($email_data) {
        //     $message->to($email_data['email'])
        //         ->subject('Order confirmed | o-bazaar')
        //         ->from('contact@o-bazaar.com', 'Order confirmed');
        // });

			return redirect()->route('thank-you')->with('message','order created successfully');
		}



    }

    public function  applyCoupon(Request $request){
        $coupon = $request->coupon;
        $total = $request->total;
        $check = Coupons::where('code', $coupon)->first();
        if ($check){
            Session::put('coupon', [
                'name' => $check->coupon,
                'discount' => $check->discount,
            ]);

            /*if($check->discount_type == 'percent'){
                $total = $total - ($total*$check->discount)/100;
                if($request->ajax()){
                     return   response()->json(['success'=>true,'total'=>$total]);
                }
            }
            else{
                $total = $total - $check->discount;
                return   response()->json(['success'=>true,'total'=>$total]);
            }*/

            $notification=array(
                'message'=>'Coupon applied!',
                'alert-type'=>'success'
            );

            if($check->statue == 'active'){
                $type = $check->discount_type;
                $discount = $check->discount;
                return   response()->json(['success'=>true,'type'=>$type,'discount'=>$discount,'notification'=>'Coupon applied!' ]);
            }
        }
        else{
            $notification=array(
                'message'=>'Invalid Coupon!',
                'alert-type'=>'error'
            );
            return response()->json(['success'=>false,'notification'=>trans('Invalid Coupon!') ]);
        }
    }









   
}
