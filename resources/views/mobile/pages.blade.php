<!DOCTYPE html>
<html lang="en">
  
  @include('mobile/inc/head')
  <body>
    @include('mobile/inc/preloader')
    <!-- Header Area-->
    <div class="header-area" id="headerArea">
      <div class="container h-100 d-flex align-items-center justify-content-between">
        <!-- Logo Wrapper-->
        <div class="logo-wrapper"><a href="home.html"><img src="img/core-img/logo-small.png" alt=""></a></div>
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
    <div class="page-content-wrapper py-3">
      <div class="container">
        <ul class="page-nav ps-0">
          <li><a href="home.html">Home<span class="badge bg-danger ms-1">Updated</span><i class="lni lni-chevron-right"></i></a></li>
          <li><a href="shop-grid.html">Shop Grid<span class="badge bg-danger ms-1">Updated</span><i class="lni lni-chevron-right"></i></a></li>
          <li><a href="shop-list.html">Shop List<span class="badge bg-danger ms-1">Updated</span><i class="lni lni-chevron-right"></i></a></li>
          <li><a href="single-product.html">Product Details<i class="lni lni-chevron-right"></i></a></li>
          <li><a href="catagory.html">Catagory<i class="lni lni-chevron-right"></i></a></li>
          <li><a href="sub-catagory.html">Sub Catagory<i class="lni lni-chevron-right"></i></a></li>
          <li><a href="wishlist-grid.html">Wishlist Grid<i class="lni lni-chevron-right"></i></a></li>
          <li><a href="wishlist-list.html">Wishlist List<i class="lni lni-chevron-right"></i></a></li>
          <li><a href="flash-sale.html">Flash Sale<i class="lni lni-chevron-right"></i></a></li>
          <li><a href="featured-products.html">Featured Products<i class="lni lni-chevron-right"></i></a></li>
          <li><a href="cart.html">Cart<i class="lni lni-chevron-right"></i></a></li>
          <li><a href="checkout-bank.html">Checkout Bank<i class="lni lni-chevron-right"></i></a></li>
          <li><a href="checkout-cash.html">Checkout Cash<i class="lni lni-chevron-right"></i></a></li>
          <li><a href="checkout-credit-card.html">Checkout Credit Card<i class="lni lni-chevron-right"></i></a></li>
          <li><a href="checkout-payment.html">Checkout Payment<i class="lni lni-chevron-right"></i></a></li>
          <li><a href="checkout-paypal.html">Checkout PayPal<i class="lni lni-chevron-right"></i></a></li>
          <li><a href="checkout.html">Checkout<i class="lni lni-chevron-right"></i></a></li>
          <li><a href="blog-grid.html">Blog Grid<i class="lni lni-chevron-right"></i></a></li>
          <li><a href="blog-list.html">Blog List<i class="lni lni-chevron-right"></i></a></li>
          <li><a href="blog-details.html">Blog Details<i class="lni lni-chevron-right"></i></a></li>
          <li><a href="change-password.html">Change Password<i class="lni lni-chevron-right">                   </i></a></li>
          <li><a href="edit-profile.html">Edit Profile<i class="lni lni-chevron-right"></i></a></li>
          <li><a href="language.html">Select Language<i class="lni lni-chevron-right"></i></a></li>
          <li><a href="intro.html">Intro Page<i class="lni lni-chevron-right"></i></a></li>
          <li><a href="login.html">Login<i class="lni lni-chevron-right"></i></a></li>
          <li><a href="register.html">Register<i class="lni lni-chevron-right"></i></a></li>
          <li><a href="otp.html">OTP Send<i class="lni lni-chevron-right"></i></a></li>
          <li><a href="otp-confirm.html">OTP Confirmation<i class="lni lni-chevron-right"></i></a></li>
          <li><a href="forget-password-success.html">Forget Password Success<i class="lni lni-chevron-right"></i></a></li>
          <li><a href="forget-password.html">Forget Password<i class="lni lni-chevron-right"></i></a></li>
          <li><a href="about-us.html">About Us<i class="lni lni-chevron-right"></i></a></li>
          <li><a href="contact.html">Contact Us<i class="lni lni-chevron-right"></i></a></li>
          <li><a href="offline.html">Offline<i class="lni lni-chevron-right"></i></a></li>
          <li><a href="message.html">Message<i class="lni lni-chevron-right"></i></a></li>
          <li><a href="my-order.html">Order Status<span class="badge bg-danger ms-1">Updated</span><i class="lni lni-chevron-right"></i></a></li>
          <li><a href="notification-details.html">Notifications Details<i class="lni lni-chevron-right"></i></a></li>
          <li><a href="notifications.html">Notifications<i class="lni lni-chevron-right"></i></a></li>
          <li><a href="payment-success.html">Payment Success<i class="lni lni-chevron-right"></i></a></li>
          <li><a href="privacy-policy.html">Privacy Policy<i class="lni lni-chevron-right"></i></a></li>
          <li><a href="profile.html">Profile<i class="lni lni-chevron-right"></i></a></li>
          <li><a href="settings.html">Settings<i class="lni lni-chevron-right">                   </i></a></li>
          <li><a href="support.html">Support<i class="lni lni-chevron-right"></i></a></li>
        </ul>
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