<?php

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;


require base_path().'/app/Helpers.php';


Route::get('/tojson', function(){
  $products = App\Models\Product::get(['id','name'])->all();
  $list = [];
    foreach ($products as $product) {
      array_push($list, [$product->id => $product->name]);
    }
    echo json_encode($list,JSON_UNESCAPED_UNICODE );
});

Route::get('/save/lang', function(){
 

 //return \Artisan::call(' translation:export --json');


  $process = new Process(["php artisan translation:export --json"]);

        try {
        $process->mustRun();

        echo $process->getOutput();
        } catch (ProcessFailedException $exception) {
        echo $exception->getMessage();
        }


  //exec ('php artisan translation:export --json');
  
 // return 'done!';

});

Route::get('/app', function($file_name = null)
{
  return Redirect::to('https://www.mediafire.com/file/7pk48uzeazra3xc/O-bazaar.apk/file');
});


  Route::view('/account/login', \System::$ACTIVE_THEME_PATH.'/account.user')->name('account.user');

  Route::post('/account/login', 'AccountController@userAuth')->name('account.auth-user');

  Route::get('/account/register', 'AccountController@register')->name('account.register');

  Route::post('/account/registration', 'AccountController@registration')->name('account.registration');

  Route::post('/join/merchant', 'Manager\ManagerStoresController@store')->name('join.merchant');

  Route::get('/clear-cache', 'WebsiteController@clearCache');
  Route::get('/memory-usage', 'WebsiteController@memoryUsage');
  Route::get('/delete/log', 'WebsiteController@deleteLog');
  Route::get('/docs', 'WebsiteController@docs');
  Route::get('/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

////forgot
Route::view('/account/forgot', \System::$ACTIVE_THEME_PATH.'/account.forgot')->name('account.forgot');
///reset
Route::post('/account/resetpassword', 'WebsiteController@validatePasswordRequest')->name('account.resetpassword');

Route::group(['prefix' => 'account' , 'as' => 'account.'  , 'middleware' => 'Account'], function(){

  Route::view('/', \System::$ACTIVE_THEME_PATH.'/account.edit')->name('edit');

  Route::post('/update', 'AccountController@update')->name('update');
  

  Route::view('/info', \System::$ACTIVE_THEME_PATH.'/info')->name('info');

  Route::view('/adresses', \System::$ACTIVE_THEME_PATH.'/account.adresses')->name('adresses');

  Route::view('/orders', \System::$ACTIVE_THEME_PATH.'/account.orders')->name('orders');

  Route::get('orders/details/{id}', 'AccountController@order_detail')->name('orders_detail');

  Route::get('/wishlist', 'AccountController@wishlist')->name('wishlist');

  Route::get('/wishlist/clear', 'AccountController@clearwishlist')->name('wishlist_clear');

  Route::get('/wishlist/remove/{id}', 'AccountController@remove')->name('wishlist.remove');

  Route::view('/shipping/add', \System::$ACTIVE_THEME_PATH.'/account.shipping_add')->name('shipping.add');

  Route::post('/shipping/add', 'AccountController@shipping_store')->name('shipping.add');

  Route::get('/shipping/edit/{id}', 'AccountController@edit_shipping')->name('shipping.edit');

  Route::post('/shipping/update/{id}', 'AccountController@update_shipping')->name('shipping.update');

  Route::get('/shipping/delete/{id}', 'AccountController@shipping_delete')->name('shipping.delete');

  Route::get('/shipping/default/{id}', 'AccountController@shipping_default')->name('shipping.default');

  Route::view('/password', \System::$ACTIVE_THEME_PATH.'/account.password')->name('password');

  Route::post('/password/update', 'AccountController@passwordUpdate')->name('password-update');

});


Route::post('/resetpassword', 'WebsiteController@validatePasswordRequest')->name('password.validate');
Route::post('/password/reset', 'WebsiteController@resetPassword')->name('password.request');
Route::any('reset_password/{token}', 'WebsiteController@getPassword')->name('password.getPassword');

Route::post('couponcheck', 'PayementController@applyCoupon')->name('applyCoupon');


Route::get('/datenschutzerklarung', 'WebsiteController@datenschutzerklarung')->name('datenschutzerklarung');

Route::get('/faq', 'WebsiteController@faq')->name('faq');

Route::get('/agb', 'WebsiteController@agb')->name('agb');

Route::get('/agb/kunden', 'WebsiteController@kunden')->name('kunden');

Route::get('/agb/lieferanten', 'WebsiteController@lieferanten')->name('lieferanten');

Route::get('/agb/lieferanten/Kunden', 'WebsiteController@lieferanten_Kunden')->name('lieferanten_Kunden');

Route::get('/datenschutzerklarung/kunden', 'WebsiteController@datenschutzerklarung_kunden')->name('datenschutzerklarung_kunden');

Route::get('/datenschutzerklarung/lieferanten/drittanbieter', 'WebsiteController@lieferanten_drittanbieter')->name('lieferanten_drittanbieter');



// Route::post('/form/send', 'WebsiteController@contactsend')->name('contact.send');
Route::get('/contact-us', 'WebsiteController@contact')->name('contact');
Route::get('/about-us', 'WebsiteController@about')->name('about');
Route::get('/thank-you', 'WebsiteController@thankyou')->name('thank-you');    
Route::get('/contact/send', 'WebsiteController@contactSend')->name('contact.send');




Route::get('/sendmail/{id}', 'WebsiteController@sendmail')->name('sendmail');


Route::get('/current/user', 'WebsiteController@device_user_token')->name('device_user_token');

Route::post('/send/device_token', 'WebsiteController@send_user_token')->name('send_user_token');

Route::get('/sendAlert/{order_id}', 'WebsiteController@send_alert')->name('send_alert');








\App::bind('option', \App\Models\Options::class);
\App::bind('BaseSettings', \App\Models\Setting::class);


Route::get('/printinvoice/{id}', 'WebsiteController@printinvoice')->name('invoice.print');
Route::get('/printinvoiceThermal/{id}', 'WebsiteController@printinvoiceThermal')->name('invoice.printThermal');



Route::get('/loadcartAgain/{store}', 'WebsiteController@loadcartHTML');



Route::get('/join', 'WebsiteController@join')->name('join');

/*
|--------------------------------------------------------------------------
| website Routes
|--------------------------------------------------------------------------
|  
*/
Route::get('/', 'BaseController@index')->name('base');
//Auth::routes();



// Route for stripe payment form.
//Route::view('stripe', 'stripe')->name('stripform');
// Route for stripe post request.
//Route::post('stripe', 'StripeController@postPaymentWithStripe')->name('paywithstripe');

/*
|--------------------------------------------------------------------------
| merchanrt Routes
|--------------------------------------------------------------------------
|  
*/-
require base_path().'/routes/organize/merchant.php';



/*
|--------------------------------------------------------------------------
| manager Routes
|--------------------------------------------------------------------------
|  
*/
require base_path().'/routes/organize/manager.php';




Route::any('/duplicate/{id}', 'DuplicateController@jahnama')->name('store.duplicate');





Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/page/{slug}', 'WebsiteController@basepage')->name('basepage');


Route::group(['prefix' => '{store}', 'middleware' => 'store' ], function ($store) {


          Route::get('/quickview/{id}', 'ShopController@quickview')->name('quickview');
  
     //     Route::get('/nearBy', 'WebsiteController@nearBy')->name('nearBy');

          Route::get('/', 'WebsiteController@home')->name('home');
          
          Route::post('/subscribe', 'NewsLetterController@subscribe')->name('subscribe');


          Route::get('/shop', 'ShopController@index')->name('shop');

          Route::get('/category/{slug}', 'ShopController@category')->name('shop.category');

          Route::get('/shop/product/{id}', 'ShopController@product')->name('shop.product');

          Route::get('/shipping/add', 'WebsiteController@shipping_add')->name('shipping.add');

          Route::get('/shipping/set/{id}', 'WebsiteController@shipping_set')->name('shipping.set');

          Route::post('/shipping/add', 'WebsiteController@shipping_store')->name('shipping.add');


          Route::get('/shipping/edit/{id}', 'ProfileController@edit_shipping')->name('shipping.edit')->middleware(['user']);

          Route::post('/shipping/update/{id}', 'ProfileController@update_shipping')->name('shipping.update')->middleware(['user']);

          Route::get('/shipping/delete/{id}', 'ProfileController@shipping_delete')->name('shipping.delete')->middleware(['user']);

          Route::get('/shipping/default/{id}', 'ProfileController@shipping_default')->name('shipping.default')->middleware(['user']);

          Route::get('/payement/methode', 'PagesController@pmethode')->name('pmethode');


          Route::get('/terms', 'WebsiteController@terms')->name('terms');

          Route::get('/faqs', 'WebsiteController@faqs')->name('faqs');

          Route::get('/favorites', 'WebsiteController@favorites')->name('favorites');

          Route::get('/wishlist', 'WebsiteController@wishlist')->name('wishlist')->middleware(['user']);

          Route::get('/checkout', 'WebsiteController@checkout')->name('checkout');

          Route::get('/account/login', 'WebsiteController@user')->name('user');

          Route::get('/register', 'WebsiteController@register')->name('register');

          Route::post('/registration', 'WebsiteController@registration')->name('registration');

          Route::post('/account/login', 'WebsiteController@userAuth')->name('auth-user');

          Route::get('/account', 'ProfileController@edit')->name('edit')->middleware(['user']);

          Route::post('/account/update', 'ProfileController@update')->name('update')->middleware(['user']);

          Route::get('/account/forgot', 'WebsiteController@forgot')->name('forgot');

          Route::get('/account/info', 'WebsiteController@info')->name('info')->middleware(['user']);

          Route::get('/adresses', 'WebsiteController@adresses')->name('adresses')->middleware(['user']);

          Route::get('/account/password', 'ProfileController@password')->name('password')->middleware(['user']);

          Route::post('/account/password/update', 'ProfileController@passwordUpdate')->name('password-update')->middleware(['user']);

          Route::post('/search', 'WebsiteController@searchProccess')->name('search');
          Route::GET('/search', 'WebsiteController@searchProccessSubmit')->name('searchSubmit');

          Route::get('/blog', 'WebsiteController@blog')->name('blog');

          Route::get('/blog/search', 'WebsiteController@search_blog')->name('search_blog');

          Route::get('/categories', 'WebsiteController@categories')->name('categories');

          Route::get('/category/{slug}', 'WebsiteController@category')->name('category');

          Route::get('/reset', 'WebsiteController@reset')->name('reset');

          Route::get('/product', 'WebsiteController@product')->name('product');

          Route::get('/orders', 'WebsiteController@orders')->name('orders')->middleware(['user']);

          Route::get('/single', 'WebsiteController@single')->name('single');


          Route::get('/404', 'WebsiteController@erreur404')->name('404');



          Route::post('/shop/pay', 'PayementController@checkout_pay')->name('checkout.pay');
          Route::any('/paypal/failed', 'PayPalController@failedPayement')->name('paypal.faild');
          Route::any('/paypal/success', 'PayPalController@successPayement')->name('paypal.success');


          // add,remove,update,clear the cart  - wishlist to cart
          Route::get('/cart', 'CartController@index')->name('cart');
          Route::get('/cart/clear', 'CartController@clear')->name('cart_clear');
          Route::any('/cart/add/{id}', 'CartController@add')->name('cart.add');
          Route::get('/cart/remove/{id}', 'CartController@remove')->name('cart.remove');
          Route::post('/cart/update/', 'CartController@update')->name('cart.update');

          // add and remove product to wishlist
          Route::get('/wishlist/add/{id}', 'WishlistController@add')->name('wishlist.add');
          Route::get('/wishlist/remove/{id}', 'WishlistController@remove')->name('wishlist.remove');
          Route::post('/wishlist/to/checkout', 'WishlistController@checkout')->name('wishlist.checkout');
          Route::get('/wishlist/clear', 'WishlistController@clear')->name('wishlist.clear');

          // add and remove product to wishlist and add coupon
          Route::post('/product/{id}/rate', 'ProductsControlleru@add')->name('product.rate');
          Route::post('/product/{id}/report', 'WishlistController@remove')->name('product.report');
          Route::post('/wishlist/to/checkout', 'WishlistController@remove')->name('favorite.remove');
          Route::post('/coupon/activate/{id}', 'CouponsController@remove')->name('favorite.remove');

          Route::get('/{page}', 'WebsiteController@page')->name('page.view');





          Route::get('orders/details/{id}', 'WebsiteController@order_detail')->name('orders_detail');





});



Route::get('/{page}', 'WebsiteController@websitepage')->name('website.page');