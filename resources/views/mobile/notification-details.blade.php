<!DOCTYPE html>
<html lang="en">
  
  @include('mobile/inc/head')
  <body>
    @include('mobile/inc/preloader')
    <!-- Header Area-->
    <div class="header-area" id="headerArea">
      <div class="container h-100 d-flex align-items-center justify-content-between">
        <!-- Back Button-->
        <div class="back-button"><a href="notifications.html">
            <svg class="bi bi-arrow-left" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"></path>
            </svg></a></div>
        <!-- Page Title-->
        <div class="page-heading">
          <h6 class="mb-0">Notifications Details</h6>
        </div>
        <!-- Navbar Toggler-->
        <div class="suha-navbar-toggler d-flex justify-content-between flex-wrap" id="suhaNavbarToggler"><span></span><span></span><span></span></div>
      </div>
    </div>
    
    <!-- NavBar -->
    @include('mobile/components/navBar')
    <!-- Page Content Wrapper-->
    <div class="page-content-wrapper">
      <div class="container">
        <!-- Notifications Details Area-->
        <div class="notification-area pt-3 pb-2">
          <!-- Notification Details-->
          <div class="list-group-item d-flex py-3"><span class="noti-icon"><i class="lni lni-alarm"></i></span>
            <div class="noti-info">
              <h6>Suha just uploaded a new product!</h6>
              <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vero laboriosam nihil magnam accusantium sint voluptatibus illo earum corporis similique libero praesentium excepturi nostrum eos soluta, cum, quis quo perferendis in?</p><a class="btn-link" href="#">Product Link</a>
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