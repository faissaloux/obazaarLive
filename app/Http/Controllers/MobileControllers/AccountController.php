<?php

namespace App\Http\Controllers\MobileControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{WishList,User,Orders};
use App;
use Session;
use Auth;
use Hash;
use Request as req;
use hisorange\BrowserDetect\Parser as Browser;
use \Carbon\Carbon;
use \App\Helpers\EmailHelper;

class AccountController extends Controller
{
    public function index()
    {
        $user = \Auth::user();
        return view($this->mobile_theme.'account/profile', compact('user'));
    }

    public function edit()
    {
        $user = \Auth::user();
        return view($this->mobile_theme.'account/profile-edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user       = \Auth::user();
        $validator  = \Validator::make($request->all(), [
          'email'   => 'required|email|unique:users,email,'.$user->id, 
          'name'    => 'required|string|min:4',
          'phone'   => 'numeric'
        ]);

        if (!$validator->fails()) {
            $user->email    = $request->email;
            $user->name     = $request->name;
            if ($request->filled('phone')) {
                $user->phone = $request->phone;
            }
            $user->save();
            return redirect()->back()->with('success', trans('user.account.updated'));
        }
        return redirect()->back()->with('failed', trans('user.account.failed.updated')); 
    }

    public function password_index()
    {
        $user = \Auth::user();
        return view($this->mobile_theme.'account/password', compact('user'));
    }

    public function password_update(Request $request)
    {
        $user = $request->user();

        $rules = [
          'password'                => 'required|min:3',
          'newpassword'             => 'required|min:3',
          'password_confirmation'   => 'required|min:3',
        ];

        $customMessages = [
            'required' => trans('user.pwd.wrong')
        ];

        $request->validate($rules, $customMessages);

        if (!\Hash::check($request->password, $user->password)) {
            return redirect()->back()->with('error', trans('user.pwd.wrong'));
        }

        if($request->newpassword == $request->password_confirmation ) {
                $user->password = \Hash::make($request->newpassword);
                $user->save();

            return redirect()->back()->with('success', trans('user.pwd.updated'));
        }

        return redirect()->back()->with('error', trans('user.pwd.wrong.match'));
    }
    
    //Login
    public function  userAuth(Request $request) {

        if(!$request->filled('username') and !$request->filled('password') ){
            return redirect()->route('mobile.login-view')->with('error',trans('user.wrong.auth'));
        }

        $username = $request->username;
        $password = $request->password;

        if (Auth::attempt(['email' => $username, 'password' => $password])){
            $id_user = Auth::user()->id;
            $lastlogin = User::find($id_user);
            $lastlogin->last_login = Carbon::now();
            $lastlogin->save(); 

            return redirect('/stores');   
        }

        else {    
             
             return redirect()->route('mobile.login-view')->with('error',trans('user.wrong.auth'));
        }         
    }

    public function order_detail($store,$id){
        $content = Orders::where('user_id',\Auth::user()->id)->where('id',$id)->first();
        if(!$content){
            abort(404);
        }
        return view($this->mobile_theme .'/store/order_detail',compact('content'));
    }

    public function order_detail_account($id){
        $content = Orders::where('user_id',\Auth::user()->id)->where('id',$id)->first();
        if(!$content){
            abort(404);
        }
        return view($this->mobile_theme .'/account/order_detail',compact('content'));
    }

    public function registration(Request $request)
    {
        $geo = geoip(req::ip());

        $rules = [
          'email' => 'required|email|unique:users', 
        ];

        $messages = [
            'email.required' => trans("email.required"),
        ];

        $request->validate($rules,$messages);

        if($request->password !== $request->password_confirmation ) {
            return redirect()->back()->with('error', trans('user.pwd.wrong.match'));
        }

        $user               =  new User();
        $user->password     =  \Hash::make($request->password);
        $user->email        =  $request->email;
        $user->name         =  $request->name;
        $user->ip           =  \Request::ip();
        $user->device       =  Browser::platformName();
        $user->browser      =  Browser::browserFamily();
        $user->country      =  $geo['country'];
        $user->statue       = 'active';
        $user->last_login   = Carbon::now();

        if ($request->filled('phone')) {
            $user->phone = $request->phone;
        }
        $user->save();

        // email data
        $email_data = array(
            'name'  => $request->name,
            'email' => $request->email,
        );

        EmailHelper::to($email_data['email'])
                    ->with($email_data)
                    ->email('emails.welcome_email')
                    ->subject(__('welcome to')." ".env('APP_NAME'))
                    ->send();

        Auth::loginUsingId($user->id);

        return redirect()->route('mobile.stores')->with('success', trans('User registred successfully'));
    }
}
