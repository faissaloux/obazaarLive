<?php

namespace App\Http\Controllers\MobileControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Carbon\Carbon;
use \App\Helpers\EmailHelper;
use \App\Models\
{
    Product, Slider, BasePages, Stores, WishList, User,Orders,ProductCategories
};

class WebsiteController extends Controller
{
    private function sendResetEmail($email, $token)
    {
        //Retrieve the user from the database
        $user = \DB::table('users')->where('email', $email)->select('name', 'email')->first();
        //Generate, the password reset link. The token generated is embedded in the link
        $link = env('APP_MOBILE_URL') . 'reset_password/' . $token;
        // email data
        $email_data = array(
            'name' => $user->name,
            'link' => $link,
            'email' => $email
        );

        $emailSent = EmailHelper::to($email_data['email'])
                                ->with($email_data)
                                ->email('emails.recover')
                                ->subject(__('Reset password'))
                                ->send();

        $emailSent ? session()->flash('success', trans('Email sent successfully'))
                   : session()->flash('error', trans('Something went wrong'));

        return true;
    }

    public function home(Request $request)
    {
        if (!\Session::has('store_id'))
        {
            $page = BasePages::where('slug', $request->store)->first();

            if (!$page)
            {
                abort(404);
            }
            else
            {
                return view($this->theme . 'home', compact('page'));
            }

        }
        else
        {
            $id         = Stores::where('slug', $request->store)->first()->id;
            $products   = Product::where('store_id', $id)->where('active', 1)->paginate(12);
            $sliders    = Slider::Merchant()->get();
            
            return view($this->mobile_theme . 'store', compact('products', 'sliders'));
        }
    }

    public function products(Request $request)
    {
        if (!\Session::has('store_id'))
        {

            $page = BasePages::where('slug', $request->store)->first();

            if (!$page)
            {
                abort(404);
            }
            else
            {

                return view($this->theme . 'home', compact('page'));
            }

        }
        else
        {
            $id             = Stores::where('slug', $request->store)->first()->id;
            $products       = Product::where('store_id', $id)->where('active', 1)->paginate(20);
            
            return view($this->mobile_theme . 'shop-grid', compact('products'));
        }
    }

    public function wishlistList()
    {
        $wishlist = WishList::currentuser()->paginate(5);
        return view($this->mobile_theme . 'wishlist-list', compact('wishlist'));
    }

    public function wishlistGrid()
    {
        $wishlist = WishList::currentuser()->paginate(5);
        return view($this->mobile_theme . 'store/wishlist-grid', compact('wishlist'));
    }

    public function wishlistGridGlob()
    {
        $wishlist = WishList::currentuser()->paginate(5);
        return view($this->mobile_theme . 'account/wishlist-grid', compact('wishlist'));
    }

    public function forgetPassword(Request $request)
    {
        $user = User::where('email', '=', $request->email)->first();
        //Check if the user exists
        if (!$user)
        {
            return redirect()->back()->withErrors(['email' => trans('User does not exist') ]);
        }

        //Create Password Reset Token
        \DB::table('password_resets')
            ->insert(['email' => $request->email, 'token' => str_random(60) , 'created_at' => Carbon::now() ]);
        //Get the token just created above
        $tokenData = \DB::table('password_resets')->where('email', $request->email)->first();
        if ($this->sendResetEmail($request->email, $tokenData->token))
        {
            return redirect()
                ->back()
                ->with('status', trans('A reset link has been sent to your email address.'));
        }
        else
        {
            return redirect()
                ->back()
                ->withErrors(['error' => trans('A Network Error occurred. Please try again.') ]);
        }
    }

    public function getPassword($token)
    {
        return view('mobile.auth.passwords.reset', ['token' => $token]);
    }

    public function resetPassword(Request $request)
    {
        //Validate input
        \Validator::make($request->all() , [
                'email'                 => 'required|email|exists:users',
                'password'              => 'required|string|min:6|confirmed',
                'password_confirmation' => 'required',
                'token'                 => 'required'
            ]);

        $updatePassword = \DB::table('password_resets')->where(['email' => $request->email, 'token' => $request
            ->token])
            ->first();

        if (!$updatePassword) return back()->withInput()->with('error', 'Invalid token!');

        if($request->password == $request->password_confirmation ) {
            User::where('email', $request->email)->update(['password' => \Hash::make($request->password) ]);

            \DB::table('password_resets')->where(['email' => $request->email])->delete();

            return redirect('/')->with('message', 'Your password has been changed!');
        }

        return redirect()->back()->with('error', trans('user.pwd.wrong.match'));
    }

    public function shipping_set($store, $id)
    {
        $user_id    = \Auth::user()->id;
        $shippping  = Addresses::where('user_id', $user_id)->where('is_shipping', true)->first();
        if ($shippping)
        {
            $shippping->is_shipping = false;
            $shippping->save();
        }
        $hop = Addresses::find($id);
        $hop->is_shipping = true;
        $hop->save();

        return redirect()->back()->with('success', trans('user.shipping.shipping'));
    }

    public function checkout()
    {
        $shipping = Shipping::where('store_id', \Session::get('store_id'))->get();
        return view($this->mobile_theme . 'checkout', compact('shipping'));
    }

    public static function send_alert($order_id)
    {
        define('API_ACCESS_KEY', 'AAAA9g3hmXo:APA91bHIRa6ZBf1HKU8KTsQ1UDjWWNq-OwsCKD9L1apL1yxohBsu_x5LLzgi7lPss-CbCD1lnaKOCIxO6pzzvgcpxmYKOfCZnSSwWcrQoW7_mbUBGjZ1iBCPyySUnZLkcinAYI557cvS');
        $fcmUrl = 'https://fcm.googleapis.com/fcm/send';

        $notification = ['title' => 'O-BAZAAR ORDER', 'body' => 'O-BAZAAR ORDER', 'sound' => 1, "sound" => "default", "click_action" => "Open_URI"];

        $extraNotificationData = ["message" => $notification, "moredata" => 'dd'];

        $token = \Auth::user()->device_token;

        $token = 'eV6EbavCTIm5kguCPJlsv4:APA91bEBzb0Sh1XFy4kMWzvbRm9-Lb6HKPLCaq0EDU6KhnebcWhTQaDx_jjGT0ev5BdwH-V8XGONIB9Wqe9gB5I4ftQliJ8Yd38PtyfYgZHmCJKgN-ikHtwBNNY3N5rUtnxkkREpHF4n';

        //$token = \App\Models\User::where('store_id',\Session::get('store_id'))->get('device_token');

        $fcmNotification = ['to' => $token, 'notification' => $notification, 'data' => ["uri" => "https://o-bazaar.com/merchant/orders/edit/".$order_id, "msg_type" => "Hello ", "request_id" => 7, "image_url" => 'https://www.gstatic.com/mobilesdk/160503_mobilesdk/logo/2x/firebase_28dp.png', "user_name" => "abdulwahab", "msg" => "msg"]];

        $headers = ['Authorization: key=' . API_ACCESS_KEY, 'Content-Type: application/json'];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $fcmUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
        $result = curl_exec($ch);
        curl_close($ch);

        print_r($result);
    }

    public function searchProccessSubmit(Request $request)
    {
        $q = $request->q;
        $lang = \App::getLocale();
        $products = Product::Active()
        ->where('name->' . $lang, 'LIKE', '%' . $q . '%')->paginate(12);
        $products->appends(['q' => $q]);
        return view($this->mobile_theme . 'shop-grid', compact('products', 'q'));
    }

    public function category($store,$slug, Request $request)
    {
        $categories = ProductCategories::where('lang', \App::getLocale())
                                        ->withCount(['products' => function($query){
                                            $query->where('active', 1);
                                        }])->get();

        $category = ProductCategories::where('slug', $slug)->first();
        if(!$category){
            abort(404);
        }
        $products = Product::where('categoryID', $category->id)
            ->where('active', 1)
            ->paginate(12);

        return view($this->mobile_theme . 'catagory', compact('products','categories'));
    }
}