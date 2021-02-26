<!DOCTYPE html>
<html lang="en">
  
  @include('mobile/inc/head')
  <body>
    @include('mobile/inc/preloader')
    <!-- Header Area-->
    <div class="header-area" id="headerArea">
      <div class="container h-100 d-flex align-items-center justify-content-between">
        @yield('header-content')
        <!-- Navbar Toggler-->
        <div class="suha-navbar-toggler d-flex flex-wrap" id="suhaNavbarToggler"><span></span><span></span><span></span></div>
      </div>
    </div>
    
    <!-- NavBar -->
    @include('mobile/components/nav_bar')
    <!-- PWA Install Alert-->
    @include('mobile/inc/alert')
    @yield('content')
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
    {{-- Footer --}}
    <!-- Footer Nav-->
    <div class="footer-nav-area" id="footerNav">
    <div class="container h-100 px-0">
      <div class="suha-footer-nav h-100">
        <ul class="h-100 d-flex align-items-center justify-content-between ps-0">
          <li class="active"><a href="/"><i class="lni lni-home"></i>{{ __('Home') }}</a></li>
          <li><a href="{{ route('mobile.account.cart.index') }}"><i class="lni lni-shopping-basket"></i>{{ __('Cart') }}</a></li>
          <li><a href="{{ route('mobile.account.wishlist.grid') }}"><i class="lni lni-heart"></i>{{ __('Wishlist') }}</a></li>
          <li><a href="#"><i class="lni lni-cog"></i>{{ __('Settings') }}</a></li>
        </ul>
      </div>
    </div>
  </div>
    @include('mobile/inc/scripts')
  </body>

</html>