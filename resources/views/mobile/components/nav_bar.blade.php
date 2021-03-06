<!-- Sidenav Black Overlay-->
<div class="sidenav-black-overlay"></div>
<!-- Side Nav Wrapper-->
<div class="suha-sidenav-wrapper" id="sidenavWrapper">
  @guest
    <ul class="sidenav-nav ps-0 guest-sidenav">
      <li><a href="{{ route('mobile.login-view') }}"><i class="lni lni-power-switch"></i>{{ __('Log In') }}</a></li>
    </ul>
  @else
    <!-- Sidenav Profile-->
    <div class="sidenav-profile">
      <div class="user-profile"><img src="{{ asset('assets/mobile/img/bg-img/9.png') }}" alt=""></div>
      <div class="user-info">
        <h6 class="user-name mb-0">{{ Auth::user()->name }}</h6>
      </div>
    </div>
    <!-- Sidenav Nav-->
    <ul class="sidenav-nav ps-0">
      <li><a href="{{ route('mobile.account.profile.index') }}"><i class="lni lni-user"></i>{{ __('My Profile') }}</a></li>
      <li><a href="{{ route('mobile.account.profile.password.index') }}"><i class="lni lni-lock"></i>{{ __('Password') }}</a></li>
      <li><a href="{{ route('mobile.account.adresses.adresses') }}"><i class="lni lni-map"></i>{{ __('Addresses') }}</a></li>
      <li><a href="{{ route('mobile.account.orders.index') }}"><i class="lni lni-ship"></i>{{ __('Orders') }}</a></li>
      <li><a href="{{ route('mobile.account.wishlist.grid') }}"><i class="lni lni-shopping-basket"></i>{{ __('My Wishlist') }}<span class="{{ System::isRtl() ? 'me-3':'ms-3'}} badge badge-warning wishlist_count">{{ $wishlist_count ?? '' }}</a></li>

      <li><a href="{{ route('logout') }}"><i class="lni lni-power-switch"></i>{{ __('Sign Out') }}</a></li>
    </ul>
  @endguest
  <!-- Go Back Button-->
  <div class="go-home-btn">
    <a href="{{ url()->previous() }}"><i class="lni {{ System::isRtl() ? 'lni-arrow-right':'lni-arrow-left'}}"></i></a>
  </div>
</div>