<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MobileControllers\AccountController;
use App\Http\Controllers\MobileControllers\WebsiteController;
use App\Http\Controllers\MobileControllers\BaseController;
use App\Http\Controllers\MobileControllers\PayementController;
use App\Http\Controllers\MobileControllers\ShopController;
use App\Http\Controllers\MobileControllers\ProfileController;
use App\Http\Controllers\MobileControllers\AdresseController;
use App\Http\Controllers\MobileControllers\WishlistController;
use App\Http\Controllers\MobileControllers\CartController;
use App\Http\Controllers\MobileControllers\Auth\LoginController;

/**
 * mobile.
 */

//Route::view('/',                        'mobile/intro'                                      );
Route::view('/login',                   \System::$ACTIVE_MOBILE_THEME_PATH.'/login'                          )->name('login-view'           );
Route::view('/forget-password',         \System::$ACTIVE_MOBILE_THEME_PATH.'/forget-password'                )->name('forget-password-view' );
Route::view('/register',                \System::$ACTIVE_MOBILE_THEME_PATH.'/register'                       )->name('register-view'        );
Route::view('/thank-you',               \System::$ACTIVE_MOBILE_THEME_PATH.'/payment-success'                )->name('thank-you'            );
Route::view('/settings',                \System::$ACTIVE_MOBILE_THEME_PATH.'/settings'                       )->name('settings'             );
Route::view('/agb',                     \System::$ACTIVE_MOBILE_THEME_PATH.'/agb'                            )->name('agb'                  );
Route::view('/datenschutzerklarung',    \System::$ACTIVE_MOBILE_THEME_PATH.'/datenschutzerklarung'           )->name('datenschutzerklarung' );
Route::view('/languages',               \System::$ACTIVE_MOBILE_THEME_PATH.'/languages'                      )->name('languages'            );

Route::post('/login',                   [AccountController::class,                  'userAuth'              ])->name('login-auth'           );
Route::get('/logout',                   [LoginController::class,                    'logout'                ])->name('logout'               );
Route::post('/registration',            [AccountController::class,                  'registration'          ])->name('registration'         );
Route::post('/reset-password',          [WebsiteController::class,                  'forgetPassword'        ])->name('forget-password'      );
Route::any('/reset_password/{token}',   [WebsiteController::class,                  'getPassword'           ])->name('getPassword'          );
Route::post('/password/reset',          [WebsiteController::class,                  'resetPassword'         ])->name('password.request'     );
Route::get('/',                         [BaseController::class,                     'index'                 ])->name('categories'           );
Route::get('/other',                    [BaseController::class,                     'stores_default'        ])->name('stores-default'       )->middleware(['store_category']);
Route::post('/couponcheck',             [PayementController::class,                 'applyCoupon'           ])->name('applyCoupon'          );

Route::group(['prefix' => '/account', 'as' => 'account.', 'middleware' => 'MAccount'], function(){    
    // Profile
    Route::group(['prefix' => '/profile','as' => 'profile.'], function(){
        Route::get('/',                 [AccountController::class, 'index'              ])->name('index'                );
        Route::get('/edit',             [AccountController::class, 'edit'               ])->name('edit'                 );
        Route::post('/update',          [AccountController::class, 'update'             ])->name('update'               );
        Route::get('/password',         [AccountController::class, 'password_index'     ])->name('password.index'       );
        Route::post('/password/update', [AccountController::class, 'password_update'    ])->name('password.update'      );
    });

    // add and remove addresses
    Route::group(['prefix' => 'adresses','as' => 'adresses.'], function(){
        Route::view('/',                \System::$ACTIVE_MOBILE_THEME_PATH.'/account.adresse'       )->name('adresses'  );
        Route::view('/add',             \System::$ACTIVE_MOBILE_THEME_PATH.'/account.add_adresse'   )->name('add'       );
        Route::post('/add',             [AccountController::class, 'shipping_create'                ])->name('create'   );    
        Route::get('/edit/{id}',        [AccountController::class, 'shipping_edit'                  ])->name('edit'     );      
        Route::post('/update/{id}',     [AccountController::class, 'shipping_update'                ])->name('update'   );      
        Route::get('/delete/{id}',      [AccountController::class, 'shipping_delete'                ])->name('delete'   );      
        Route::get('/default/{id}',     [AccountController::class, 'shipping_default'               ])->name('default'  );
    });
    
    // add and remove product from wishlist
    Route::group(['prefix' => 'wishlist', 'as' => 'wishlist.'], function(){
        Route::get('/',                 [WebsiteController::class,  'wishlistList'      ])->name('list'     );
        Route::get('/grid',             [WebsiteController::class,  'wishlistGridGlob'  ])->name('grid'     );
        Route::get('/add/{id}',         [WishlistController::class, 'add'               ])->name('add'      );
        Route::get('/remove/{id}',      [WishlistController::class, 'remove'            ])->name('remove'   );
        Route::get('/clear',            [WishlistController::class, 'clear'             ])->name('clear'    );
    });

    // add and remove product from cart
    Route::group(['prefix' => 'cart', 'as' => 'cart.'], function(){
        Route::get('index',                     [CartController::class, 'index'         ])->name('index'    );
        Route::any('add/{id}',                  [CartController::class, 'add'           ])->name('add'      );
        Route::post('update',                   [CartController::class, 'update'        ])->name('update'   );
        Route::get('remove/{id}/{product_id}',  [CartController::class, 'remove'        ])->name('remove'   );
    });

    // all orders and order detail
    Route::group(['prefix' => 'orders','as' => 'orders.'], function(){
        Route::view('/',            \System::$ACTIVE_MOBILE_THEME_PATH.'/account.orders' )->name('index'        );
        Route::get('/details/{id}', [AccountController::class, 'order_detail_account'   ])->name('orders_detail');
    });
});

Route::group(['prefix' => '{store_category}', 'middleware' => 'store_category'], function ($store_category) {
    Route::get('/',                     [BaseController::class,                     'stores'                ])->name('stores'               );
    Route::group(['prefix' => '{store}', 'as' => 'store.', 'middleware' => 'store'], function(){
        Route::get('/search',               [WebsiteController::class,                  'searchProccessSubmit'  ])->name('searchSubmit' );
        Route::get('/category/{slug}',      [WebsiteController::class,                  'category'              ])->name('category'     );
        Route::get('/',                     [WebsiteController::class,                  'home'                  ])->name('home'         );
        Route::get('/products',             [WebsiteController::class,                  'products'              ])->name('products'     );
        Route::get('/product/{id}',         [ShopController::class,                     'product'               ])->name('product'      );
        Route::get('/shipping/set/{id}',    [WebsiteController::class,                  'shipping_set'          ])->name('shipping.set' );
        Route::post('/shop/pay',            [PayementController::class,                 'checkout_pay'          ])->name('checkout.pay' );
        
        Route::group(['prefix' => 'account', 'middleware' => 'MAccount'], function(){    
            // Profile
            Route::group(['prefix' => 'profile','as' => 'profile.'], function(){
                Route::get('/',                     [ProfileController::class, 'index'          ])->name('index'                );
                Route::get('/edit',                 [ProfileController::class, 'edit'           ])->name('edit'                 );
                Route::post('/update',              [ProfileController::class, 'update'         ])->name('update'               );
                Route::get('/password',             [ProfileController::class, 'password_index' ])->name('password.index'       );
                Route::post('/password/update',     [ProfileController::class, 'password_update'])->name('password.update'      );
            });
        
            // add and remove addresses
            Route::group(['prefix' => 'adresses','as' => 'adresses.'], function(){
                Route::get('/',                     [AdresseController::class, 'index'          ])->name('index'    );    
                Route::get('/add',                  [AdresseController::class, 'create'         ])->name('create'   );    
                Route::post('/store',               [AdresseController::class, 'store'          ])->name('add'      );    
                Route::get('/edit/{id}',            [AdresseController::class, 'edit'           ])->name('edit'     );      
                Route::post('/update/{id}',         [AdresseController::class, 'update'         ])->name('update'   );      
                Route::get('/delete/{id}',          [AdresseController::class, 'delete'         ])->name('delete'   );      
                Route::get('/default/{id}',         [AdresseController::class, 'default'        ])->name('default'  );
            });
            
            // add and remove product from wishlist
            Route::group(['prefix' => 'wishlist', 'as' => 'wishlist.'], function(){
                Route::get('/',                     [WebsiteController::class,  'wishlistList'  ])->name('list'     );
                Route::get('/grid',                 [WebsiteController::class,  'wishlistGrid'  ])->name('grid'     );
                Route::get('/add/{id}',             [WishlistController::class, 'add'           ])->name('add'      );
                Route::get('/remove/{id}',          [WishlistController::class, 'remove'        ])->name('remove'   );
                Route::get('/clear',                [WishlistController::class, 'clear'         ])->name('clear'    );
            });
        
            // add and remove product from cart
            Route::group(['prefix' => 'cart', 'as' => 'cart.'], function(){
                Route::get('index',                     [CartController::class, 'index'         ])->name('index'    );
                Route::any('add/{id}',                  [CartController::class, 'add'           ])->name('add'      );
                Route::post('update',                   [CartController::class, 'update'        ])->name('update'   );
                Route::get('remove/{id}/{product_id}',  [CartController::class, 'remove'        ])->name('remove'   );
            });
        
            // all orders and order detail
            Route::group(['prefix' => 'orders','as' => 'orders.'], function(){
                Route::view('/',            \System::$ACTIVE_MOBILE_THEME_PATH.'/store/orders'   )->name('index'            );
                Route::get('/details/{id}', [AccountController::class, 'order_detail'           ])->name('orders_detail'    );
            });

            Route::get('/checkout',         [WebsiteController::class, 'checkout'               ])->name('checkout'         );
        });
    });
});