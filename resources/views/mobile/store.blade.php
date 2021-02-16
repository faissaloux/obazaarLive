<!DOCTYPE html>
<html lang="en">
  
<head>
  @include('mobile/inc/head')
  </head>
  <body>
    @include('mobile/inc/preloader')
    <!-- Header Area-->
    <div class="header-area" id="headerArea">
      <div class="container h-100 d-flex align-items-center justify-content-between">
        <!-- Logo Wrapper-->
        <div class="logo-wrapper"><a href="home.html"><img src="{{ asset('assets/mobile/img/core-img/logo-small.png') }}" alt=""></a></div>
        <!-- Search Form-->
        <div class="top-search-form">
          <form action="#" method="">
            <input class="form-control" type="search" placeholder="Enter your keyword">
            <button type="submit"><i class="fa fa-search"></i></button>
          </form>
        </div>
        <!-- Navbar Toggler-->
        <div class="suha-navbar-toggler d-flex flex-wrap" id="suhaNavbarToggler"><span></span><span></span><span></span></div>
      </div>
    </div>
    <!-- Sidenav Black Overlay-->
    <div class="sidenav-black-overlay"></div>
    <!-- Side Nav Wrapper-->
    <div class="suha-sidenav-wrapper" id="sidenavWrapper">
      <!-- Sidenav Profile-->
      <div class="sidenav-profile">
        <div class="user-profile"><img src="img/bg-img/9.jpg" alt=""></div>
        <div class="user-info">
          <h6 class="user-name mb-0">Suha Jannat</h6>
          <p class="available-balance">Balance <span>$<span class="counter">523.98</span></span></p>
        </div>
      </div>
      <!-- Sidenav Nav-->
      <ul class="sidenav-nav ps-0">
        <li><a href="profile.html"><i class="lni lni-user"></i>My Profile</a></li>
        <li><a href="notifications.html"><i class="lni lni-alarm lni-tada-effect"></i>Notifications<span class="ms-3 badge badge-warning">3</span></a></li>
        <li class="suha-dropdown-menu"><a href="#"><i class="lni lni-cart"></i>Shop Pages</a>
          <ul>
            <li><a href="shop-grid.html">- Shop Grid</a></li>
            <li><a href="shop-list.html">- Shop List</a></li>
            <li><a href="single-product.html">- Product Details</a></li>
            <li><a href="featured-products.html">- Featured Products</a></li>
            <li><a href="flash-sale.html">- Flash Sale</a></li>
          </ul>
        </li>
        <li><a href="pages.html"><i class="lni lni-empty-file"></i>All Pages</a></li>
        <li class="suha-dropdown-menu"><a href="wishlist-grid.html"><i class="lni lni-heart"></i>My Wishlist</a>
          <ul>
            <li><a href="wishlist-grid.html">- Wishlist Grid</a></li>
            <li><a href="wishlist-list.html">- Wishlist List</a></li>
          </ul>
        </li>
        <li><a href="settings.html"><i class="lni lni-cog"></i>Settings</a></li>
        <li><a href="intro.html"><i class="lni lni-power-switch"></i>Sign Out</a></li>
      </ul>
      <!-- Go Back Button-->
      <div class="go-home-btn" id="goHomeBtn"><i class="lni lni-arrow-left"></i></div>
    </div>
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
                    <a class="wishlist-btn" href="#">
                      <i class="lni lni-heart"></i>
                    </a>
                    <a class="product-thumbnail d-block" href="single-product.html">
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
                    <a class="btn btn-success btn-sm" href="#"><i class="lni lni-plus"></i></a>
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