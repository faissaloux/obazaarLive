<!DOCTYPE html>
<html lang="en">
  
  @include('mobile/inc/head')
  <body>
    @include('mobile/inc/preloader')
    <!-- Header Area-->
    <div class="header-area" id="headerArea">
      <div class="container h-100 d-flex align-items-center justify-content-between">
        <!-- Back Button-->
        <div class="back-button"><a href="checkout-payment.html">
            <svg class="bi bi-arrow-left" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"></path>
            </svg></a></div>
        <!-- Page Title-->
        <div class="page-heading">
          <h6 class="mb-0">PayPal Info</h6>
        </div>
        <!-- Navbar Toggler-->
        <div class="suha-navbar-toggler d-flex justify-content-between flex-wrap" id="suhaNavbarToggler"><span></span><span></span><span></span></div>
      </div>
    </div>
    
    <!-- NavBar -->
    @include('mobile/components/navBar')
    <div class="page-content-wrapper">
      <div class="container">
        <!-- Checkout Wrapper-->
        <div class="checkout-wrapper-area py-3">
          <div class="credit-card-info-wrapper"><img class="d-block mb-4" src="img/bg-img/credit-card.png" alt="">
            <div class="pay-credit-card-form">
              <form action="https://designing-world.com/suha-v2.3.0/payment-success.html" method="">
                <div class="mb-3">
                  <label for="paypalEmail">Email Address</label>
                  <input class="form-control" type="email" id="paypalEmail" placeholder="paypal@example.com" value=""><small class="ms-1"><i class="fa fa-lock me-1"></i>Secure online payments at the speed of want.<a class="ms-1" href="#">Learn More</a></small>
                </div>
                <div class="mb-3">
                  <label for="paypalPassword">Password</label>
                  <input class="form-control" type="password" id="paypalPassword" value="">
                </div>
                <button class="btn btn-warning btn-lg w-100" type="submit">Pay Now</button>
              </form>
            </div>
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