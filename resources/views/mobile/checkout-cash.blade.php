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
          <h6 class="mb-0">Cash - COD</h6>
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
            <div class="cod-info text-center mb-3">
              <p>Pay when you receive your products. Lorem ipsum dolor sit amet consectetur adipisicing elit. Et qui nam perferendis.</p>
            </div><a class="btn btn-warning btn-lg w-100" href="payment-success.html">Order Now</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
    {{-- Footer --}}
    @include('mobile/inc/footer')
    @include('mobile/inc/scripts')
  </body>

</html>