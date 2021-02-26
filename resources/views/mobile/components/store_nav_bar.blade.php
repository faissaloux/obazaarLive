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
      <div class="user-profile"><img src="{{ asset('assets/mobile/img/bg-img/9.jpg') }}" alt=""></div>
      <div class="user-info">
        <h6 class="user-name mb-0">Suha Jannat</h6>
      </div>
    </div>
    <!-- Sidenav Nav-->
    <ul class="sidenav-nav ps-0">
      <li><a href="{{ route('mobile.store.profile.index', [  'store' => \Session::get('store')]) }}"><i class="lni lni-user"></i>{{ __('My Profile') }}</a></li>
      <li><a href="{{ route('mobile.store.profile.password.index', [  'store' => \Session::get('store')]) }}"><i class="lni lni-lock"></i>{{ __('Password') }}</a></li>
      <li><a href="{{ route('mobile.store.adresses.index', ['store' => \Session::get('store')]) }}"><i class="lni lni-map"></i>{{ __('Addresses') }}</a></li>
      <li><a href="{{ route('mobile.account.profile.index') }}"><i class="lni lni-shopping-basket"></i>{{ __('Orders') }}</a></li>
      <li class="suha-dropdown-menu">
        <a href="#">
          <i class="lni lni-heart"></i>{{ __('My Wishlist') }}<span class="ms-3 badge badge-warning wishlist_count">{{ $wishlist_count ?? '' }}</span>
        </a>
        <ul>
          <li><a href="{{ route('mobile.store.wishlist.grid' ,[  'store' => \Session::get('store')] ) }}">- {{ __('Wishlist Grid') }}</a></li>
          <li><a href="{{ route('mobile.store.wishlist.list' ,[  'store' => \Session::get('store')] ) }}">- {{ __('Wishlist List') }}</a></li>
        </ul>
      </li>
      <li><a href="{{ route('logout') }}"><i class="lni lni-power-switch"></i>{{ __('Sign Out') }}</a></li>
    </ul>
  @endguest
  <!-- Go Back Button-->
  <div class="go-home-btn">
    <a href="{{ url()->previous() }}"><i class="lni lni-arrow-left"></i></a>
  </div>
</div>

  
  <!-- Modals -->
  @include('mobile/components/modals')