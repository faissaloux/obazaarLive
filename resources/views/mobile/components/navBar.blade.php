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
    <li class="suha-dropdown-menu">
      <a href="#">
        <i class="lni lni-heart"></i>My Wishlist<span class="ms-3 badge badge-warning wishlist_count">{{ $wishlist_count ?? '' }}</span>
      </a>
      <ul>
        <li><a href="{{ route('mobile.store.wishlist.grid' ,[  'store' => \Session::get('store')] ) }}">- Wishlist Grid</a></li>
        <li><a href="{{ route('mobile.store.wishlist.list' ,[  'store' => \Session::get('store')] ) }}">- Wishlist List</a></li>
      </ul>
    </li>
    <li><a href="#"><i class="lni lni-cog"></i>Settings</a></li>
    <li><a href="{{ route('logout') }}"><i class="lni lni-power-switch"></i>Sign Out</a></li>
  </ul>
  <!-- Go Back Button-->
  <div class="go-home-btn">
    <a href="{{ route('mobile.store.goBack', ['store' => \Session::get('store') ]) }}"><i class="lni lni-arrow-left"></i></a>
  </div>
</div>

  
    <!-- Modals -->
    @include('mobile/components/modals')