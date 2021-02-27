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
        return view($this->mobile_theme . 'wishlist-grid', compact('wishlist'));
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