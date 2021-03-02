<!DOCTYPE html>
<html lang="{{ App::getLocale() }}" dir="{{ System::isRtl()?'rtl':'ltr' }}">
  
  @include('mobile/inc/head')
  <body class="@yield('bodyClass')  @if(Auth::check())  has-logged   @endif @if(!\System::shoppingCartIsNotEmpty()) cart-empty @endif" data-auth-id="{{ \System::userId() }}" data-store-category="{{ \Session::get('store_category') }}" data-slug="{{ \Session::get('store') }}" data-store-id="{{ \System::currentStoreId() }}">
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
    @include('mobile/components/store_nav_bar')
    <!-- PWA Install Alert-->
    @include('mobile/inc/alert')
    @yield('content')
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
    {{-- Footer --}}
    <!-- Footer Nav-->
    @include('mobile/inc/store_footer')
    @include('mobile/inc/scripts')
  </body>

</html>