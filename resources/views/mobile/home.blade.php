<!DOCTYPE html>
<html lang="en">
  
  @include('mobile/inc/head')
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
    
    <!-- NavBar -->
    @include('mobile/components/navBar')
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
          <!-- Hero Slides-->
          <div class="hero-slides owl-carousel">
            @foreach($sliders as $slider)
              <div class="single-hero-slide" style="background-image: url('{{ asset('uploads/'.$slider->image) }}')">
              </div>
            @endforeach
          </div>
        </div>
      </div>
      <!-- Weekly Best Sellers-->
      <div class="weekly-best-seller-area py-3">
        <div class="container">
          <div class="row g-3">
            @foreach($stores as $store)
              <div class="col-12 col-md-6">
                <div class="card weekly-product-card">
                  <div class="card-body d-flex align-items-center">
                    <div class="product-thumbnail-side">
                      <a class="product-thumbnail d-block" href="{{ $store->slug }}">
                        <img class="h-auto" src="{{ asset('uploads/'.$store->thumbnail) }}" alt="">
                      </a>
                    </div>
                    <div class="product-description">
                      <a class="product-title d-block" href="{{ $store->slug }}">{{ $store->name }}</a>
                      <p class="product-description-location">
                        <i class="lni lni-map-marker"></i>
                        <span>{{ $store->street }}</span>
                      </p>
                      <p class="product-description-email">
                        <i class="lni lni-envelope"></i>
                        <span>{{ $store->owner->email }}</span>
                      </p>
                      <p class="product-description-phone">
                        <i class="lni lni-phone"></i>
                        <span>{{ $store->owner->phone }}</span>
                      </p>
                    </div>
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