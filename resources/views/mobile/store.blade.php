<!DOCTYPE html>
<html lang="en">
  
<head>
  @include('mobile/inc/head')
  </head>
  <body class="@yield('bodyClass')  @if(Auth::check())  has-logged   @endif @if(!\System::shoppingCartIsNotEmpty()) cart-empty @endif" data-auth-id="{{ \System::userId() }}" data-slug="{{ \Session::get('store') }}" data-store-id="{{ \System::currentStoreId() }}">
    @include('mobile/inc/preloader')
    
    <!-- Unauth Modal -->
    <div class="modal" id="modalUnauth" tabindex="-1" role="dialog" >
      <div class="modal-dialog modal-lg modal-dialog-centered">
         <div class="modal-content">
            <div class="modal-body">
               <h5 class="modaltitle">{{ __('You have to login') }}</h5>
               <center>
                  <a href="{{ route('mobile.login-view') }}" class="ps-btn">{{ __('Login') }}</a>
               </center>
            </div>
         </div>
      </div>
   </div>
    
   <!-- Header Area -->
   @include('mobile/components/headerArea')
    <!-- PWA Install Alert-->
    <div class="toast pwa-install-alert shadow bg-white" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000" data-bs-autohide="true">
      <div class="toast-body">
        <div class="content d-flex align-items-center mb-2"><img src="img/icons/icon-72x72.png" alt="">
          <h6 class="mb-0">Add to Home Screen</h6>
          <button class="btn-close ms-auto" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
        </div><span class="mb-0 d-block">Add Suha on your mobile home screen. Click the<strong class="mx-1">"Add to Home Screen"</strong>button &amp; enjoy it like a regular app.</span>
      </div>
    </div>
    <div class="page-content-wrapper">
      <div class="container">
        <div class="pt-3">
          <div class="hero-slides owl-carousel">
            @foreach($sliders as $slider)
              <div class="single-hero-slide" style="background-image: url('{{ asset('uploads/'.$slider->image) }}')">
                <div class="slide-content h-100 d-flex align-items-center">
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
      <div class="flash-sale-wrapper mt-3">
        <div class="container">
          <div class="flash-sale-slide owl-carousel">
            {!! app('SiteSetting')->MerchantStoreCategories() !!}
          </div>
        </div>
      </div>
      <div class="top-products-area clearfix py-3">
        <div class="container">
          <div class="section-heading d-flex align-items-center justify-content-between">
            <h6>Top Products</h6><a class="btn btn-danger btn-sm" href="{{ route('mobile.store.products', ['store' => \Session::get('store')]) }}">View All</a>
          </div>
          <div class="row g-3">
            @foreach($products as $product)
              <div class="col-6 col-md-4 col-lg-3">
                <div class="card top-product-card">
                  <div class="card-body">
                    <a class="wishlist-btn" id="wishlistMb"  href="javascript:;" data-link="{{ route('mobile.store.wishlist.add', ['store' => \Session::get('store'), 'id' => $product->id ]) }}">
                      <i class="lni lni-heart"></i>
                    </a>
                    <a class="product-thumbnail d-block" href="{{ route('mobile.store.product', ['store' => \Session::get('store'), 'id' => $product->id]) }}">
                      <img class="mb-2" src="{{ $product->thumbnail }}">
                    </a>
                    <a class="product-title d-block" href="single-product.html">{{ $product->name }}</a>
                    <p class="sale-price">{{ $product->price }}</p>
                    <div class="product-rating">
                      <i class="lni lni-star-filled"></i>
                      <i class="lni lni-star-filled"></i>
                      <i class="lni lni-star-filled"></i>
                      <i class="lni lni-star-filled"></i>
                      <i class="lni lni-star-filled"></i>
                    </div>
                    <a class="btn btn-success btn-sm" 
                      id="addtocardMb"
                      href="{{ route('mobile.store.cart.add', ['id' => $product->id , 'store' => \Session::get('store')]) }}" 
                      data-product-id='{{$product->id}}'>
                        <i class="lni lni-plus"></i>
                    </a>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
    <!-- Footer Nav-->
    <div class="footer-nav-area" id="footerNav">
      <div class="container h-100 px-0">
        <div class="suha-footer-nav h-100">
          <ul class="h-100 d-flex align-items-center justify-content-between ps-0">
            <li class="active"><a href="home.html"><i class="lni lni-home"></i>Home</a></li>
            <li><a href="message.html"><i class="lni lni-life-ring"></i>Support</a></li>
            <li><a href="cart.html"><i class="lni lni-shopping-basket"></i>Cart</a></li>
            <li><a href="pages.html"><i class="lni lni-heart"></i>Pages</a></li>
            <li><a href="settings.html"><i class="lni lni-cog"></i>Settings</a></li>
          </ul>
        </div>
      </div>
    </div>
    @include('mobile/inc/scripts')
  </body>

</html>