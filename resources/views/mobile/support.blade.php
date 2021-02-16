<!DOCTYPE html>
<html lang="en">
  
  @include('mobile/inc/head')
  <body>
    @include('mobile/inc/preloader')
    <!-- Header Area-->
    <div class="header-area" id="headerArea">
      <div class="container h-100 d-flex align-items-center justify-content-between">
        <!-- Back Button-->
        <div class="back-button"><a href="settings.html">
            <svg class="bi bi-arrow-left" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"></path>
            </svg></a></div>
        <!-- Page Title-->
        <div class="page-heading">
          <h6 class="mb-0">Support</h6>
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
            <li><a href="wishlist-grid.html">- Wishlist Grid</a></li>
            <li><a href="wishlist-list.html">- Wishlist List</a></li>
          </ul>
        </li>
        <li><a href="settings.html"><i class="lni lni-cog"></i>Settings</a></li>
        <li><a href="intro.html"><i class="lni lni-power-switch"></i>Sign Out</a></li>
      </ul>
      <!-- Go Back Button-->
      <div class="go-home-btn" id="goHomeBtn"><i class="lni lni-arrow-left"></i></div>
    </div>
    <div class="page-content-wrapper">
      <div class="container">
        <!-- Support Wrapper-->
        <div class="support-wrapper py-3">
          <div class="card">
            <div class="card-body">
              <h4 class="faq-heading text-center">How can we help you with?</h4>
              <!-- Search Form-->
              <form class="faq-search-form" action="#" method="">
                <input class="form-control" type="search" name="search" placeholder="Search">
                <button type="submit"><i class="fa fa-search"></i></button>
              </form>
            </div>
          </div>
          <!-- Accordian Area Wrapper-->
          <div class="accordian-area-wrapper mt-3">
            <!-- Accordian Card-->
            <div class="card accordian-card clearfix">
              <div class="card-body">
                <h5 class="accordian-title">For Buyers</h5>
                <div class="accordion" id="accordion1">
                  <!-- Single Accordian-->
                  <div class="accordian-header" id="headingOne">
                    <button class="d-flex align-items-center justify-content-between w-100 collapsed btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne"><span><i class="lni lni-bi-cycle"></i>How to get started?</span><i class="lni lni-chevron-right"></i></button>
                  </div>
                  <div class="collapse" id="collapseOne" aria-labelledby="headingOne" data-bs-parent="#accordion1">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero excepturi tempore exercitationem porro dignissimos.</p>
                  </div>
                  <!-- Single Accordian-->
                  <div class="accordian-header" id="headingTwo">
                    <button class="d-flex align-items-center justify-content-between w-100 collapsed btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><span><i class="lni lni-cart-full"></i>How to buy a product?</span><i class="lni lni-chevron-right"></i></button>
                  </div>
                  <div class="collapse" id="collapseTwo" aria-labelledby="headingTwo" data-bs-parent="#accordion1">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero excepturi tempore exercitationem porro dignissimos.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Accordian Area Wrapper-->
          <div class="accordian-area-wrapper mt-3">
            <!-- Accordian Card-->
            <div class="card accordian-card seller-card clearfix">
              <div class="card-body">
                <h5 class="accordian-title">For Authors</h5>
                <div class="accordion" id="accordion2">
                  <!-- Single Accordian-->
                  <div class="accordian-header" id="headingThree">
                    <button class="d-flex align-items-center justify-content-between w-100 collapsed btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><span><i class="lni lni-dropbox"></i>How can upload a product?</span><i class="lni lni-chevron-right"></i></button>
                  </div>
                  <div class="collapse" id="collapseThree" aria-labelledby="headingThree" data-bs-parent="#accordion2">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero excepturi tempore exercitationem porro dignissimos.</p>
                  </div>
                  <!-- Single Accordian-->
                  <div class="accordian-header" id="headingFour">
                    <button class="d-flex align-items-center justify-content-between w-100 collapsed btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour"><span><i class="lni lni-dollar"></i>Commission structure</span><i class="lni lni-chevron-right"></i></button>
                  </div>
                  <div class="collapse" id="collapseFour" aria-labelledby="headingFour" data-bs-parent="#accordion2">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero excepturi tempore exercitationem porro dignissimos.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Accordian Area Wrapper-->
          <div class="accordian-area-wrapper mt-3">
            <!-- Accordian Card-->
            <div class="card accordian-card others-card clearfix">
              <div class="card-body">
                <h5 class="accordian-title">Others</h5>
                <div class="accordion" id="accordion3">
                  <!-- Single Accordian-->
                  <div class="accordian-header" id="headingFive">
                    <button class="d-flex align-items-center justify-content-between w-100 collapsed btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive"><span><i class="lni lni-exit"></i>How to return a product?</span><i class="lni lni-chevron-right"></i></button>
                  </div>
                  <div class="collapse" id="collapseFive" aria-labelledby="headingFive" data-bs-parent="#accordion3">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero excepturi tempore exercitationem porro dignissimos.</p>
                  </div>
                  <!-- Single Accordian-->
                  <div class="accordian-header" id="headingSix">
                    <button class="d-flex align-items-center justify-content-between w-100 collapsed btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix"><span><i class="lni lni-emoji-sad"></i>My product is misleading?</span><i class="lni lni-chevron-right"></i></button>
                  </div>
                  <div class="collapse" id="collapseSix" aria-labelledby="headingSix" data-bs-parent="#accordion3">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero excepturi tempore exercitationem porro dignissimos.</p>
                  </div>
                </div>
              </div>
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