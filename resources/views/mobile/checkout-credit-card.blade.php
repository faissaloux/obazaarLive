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
          <h6 class="mb-0">Credit Card Info</h6>
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
          <!-- Credit Card Info-->
          <div class="credit-card-info-wrapper"><img class="d-block mb-4" src="img/bg-img/credit-card.png" alt="">
            <div class="pay-credit-card-form">
              <form action="https://designing-world.com/suha-v2.3.0/payment-success.html" method="">
                <div class="mb-3">
                  <label for="cardNumber">Credit Card Number</label>
                  <input class="form-control" type="text" id="cardNumber" placeholder="1234 ×××× ×××× ××××" value=""><small class="ms-1"><i class="fa fa-lock me-1"></i>Your payment info is stored securely.<a class="ms-1" href="#">Learn More</a></small>
                </div>
                <div class="mb-3">
                  <label for="cardholder">Cardholder Name</label>
                  <input class="form-control" type="text" id="cardholder" placeholder="SUHA JANNAT" value="">
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="mb-3">
                      <label for="expiration">Exp. Date</label>
                      <input class="form-control" type="text" id="expiration" placeholder="12/20" value="">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="mb-3">
                      <label for="cvvcode">CVV Code</label>
                      <input class="form-control" type="text" id="cvvcode" placeholder="××××" value="">
                    </div>
                  </div>
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
    {{-- Footer --}}
    @include('mobile/inc/footer')
    @include('mobile/inc/scripts')
  </body>

</html>