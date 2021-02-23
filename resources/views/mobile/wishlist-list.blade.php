<!DOCTYPE html>
<html lang="en">
  
  @include('mobile/inc/head')
  <body  data-slug="{{ \Session::get('store') }}" >
    @include('mobile/inc/preloader')
    <!-- Header Area-->
    <div class="header-area" id="headerArea">
      <div class="container h-100 d-flex align-items-center justify-content-between">
        <!-- Back Button-->
        <div class="back-button"><a href="home.html">
            <svg class="bi bi-arrow-left" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"></path>
            </svg></a></div>
        <!-- Page Title-->
        <div class="page-heading">
          <h6 class="mb-0">Wishlist</h6>
        </div>
        <!-- Navbar Toggler-->
        <div class="suha-navbar-toggler d-flex justify-content-between flex-wrap" id="suhaNavbarToggler"><span></span><span></span><span></span></div>
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
            <li><a href="{{ route('mobile.store.wishlist.grid' ,[  'store' => \Session::get('store')] ) }}">- Wishlist Grid</a></li>
            <li><a href="{{ route('mobile.store.wishlist.list' ,[  'store' => \Session::get('store')] ) }}">- Wishlist List</a></li>
          </ul>
        </li>
        <li><a href="settings.html"><i class="lni lni-cog"></i>Settings</a></li>
        <li><a href="intro.html"><i class="lni lni-power-switch"></i>Sign Out</a></li>
      </ul>
      <!-- Go Back Button-->
      <div class="go-home-btn" id="goHomeBtn"><i class="lni lni-arrow-left"></i></div>
    </div>
    <div class="page-content-wrapper">
      <!-- Top Products-->
      <div class="top-products-area py-3">
        <div class="container">
          <div class="section-heading d-flex align-items-center justify-content-between">
            @if($wishlist->count() != 0)
                <div class="ps-section__header">
                  <h3>{{ __('Wishlist') }} ( {{$wishlist->count()}} )</h3>
                </div>
            @endif
            <!-- Layout Options-->
            <div class="layout-options">
              <a href="{{ route('mobile.store.wishlist.grid' ,[  'store' => \Session::get('store')] ) }}"><i class="lni lni-grid-alt"></i></a>
              <a class="active" href="{{ route('mobile.store.wishlist.list' ,[  'store' => \Session::get('store')] ) }}"><i class="lni lni-radio-button"></i></a>
            </div>
          </div>
          <div class="row g-3">
            <!-- Wishlist Product -->
            @if($wishlist->count() != 0)
              @foreach($wishlist as $wishlistItem)
                <div class="col-12 col-md-6">
                  <div class="card weekly-product-card">
                    <div class="card-body d-flex align-items-center">
                      <div class="product-thumbnail-side">
                        <a class="product-thumbnail d-block"  href="{{ route('mobile.store.product',['id' => $wishlistItem->productID , 'store' => \Session::get('store')]) }}">
                          <img class="h-auto mb-2" src="{{ $wishlistItem->product->thumbnail }}">
                        </a>
                      </div>
                      <div class="product-description">
                        <a class="product-title d-block" href="{{ route('mobile.store.product',['id' => $wishlistItem->productID , 'store' => \Session::get('store')]) }}">{{$wishlistItem->product->name }}</a>
                        <p class="sale-price">{{ $wishlistItem->product->price }} €</p>
                        <a id="addtocardMb" class="btn btn-success btn-sm"   href="{{ route('mobile.store.cart.add', ['id' => $wishlistItem->product->id , 'store' => \Session::get('store')]) }}"  data-product-id='{{$wishlistItem->product->id}}'>
                          <i class="lni lni-plus"></i>Buy Now
                        </a>
                        </div>
                    </div>
                  </div>
                </div>
              @endforeach
            @else
            <div class="ps-table--invoices">
                  <div class="row text-center">
                      <div class="empty-order">
                          <i class="icon-heart"></i>
                          <p>{{ __('You have no favorites') }}</p>
                          <a class="ps-btn" href="/{{ $store }}">{{ __('Continue Shopping') }}</a>
                      </div>
                  </div>
              </div>
            @endif

            <!-- Select All Products-->
            @if($wishlist->count() != 0)
              <div class="col-12">
                <div class="select-all-products-btn"><a class="btn btn-danger w-100" href="#">
                  <i class="lni lni-heart"></i>{{ __('clear wishlist') }}</a></div>
              </div>
            @endif

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