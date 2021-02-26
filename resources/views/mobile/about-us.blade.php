<!DOCTYPE html>
<html lang="en">
  
  @include('mobile/inc/head')
  <body>
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
          <h6 class="mb-0">About Us</h6>
        </div>
        <!-- Navbar Toggler-->
        <div class="suha-navbar-toggler d-flex justify-content-between flex-wrap" id="suhaNavbarToggler"><span></span><span></span><span></span></div>
      </div>
    </div>
    
    <!-- NavBar -->
    @include('mobile/components/navBar')
    <div class="page-content-wrapper py-3">
      <div class="container">
        <div class="card">
          <div class="card-body">
            <div class="about-content-wrap"><img class="mb-3" src="img/bg-img/12.png" alt="">
              <h5>We are here for your all needs. Let's together safer the world. Stay at home, stay safe.</h5>
              <p>A versatile e-commerce shop template. It is very nicely designed with modern features &amp; coded with the latest technology.</p>
              <p>It nicely views on all devices with smartphones, tablets, laptops &amp; desktops.</p>
              <ul class="mb-3 ps-3">
                <li class="ps-2"><i class="lni lni-checkmark-circle me-1"></i>Versatile e-commerce template</li>
                <li class="ps-2"><i class="lni lni-checkmark-circle me-1"></i>Nicely designed with modern features</li>
                <li class="ps-2"><i class="lni lni-checkmark-circle me-1"></i>Coded with the latest technology</li>
              </ul>
              <p>It nicely views on all devices with smartphones, tablets, laptops &amp; desktops.</p>
              <div class="row">
                <div class="col-6"><img class="mb-3 rounded" src="img/bg-img/12.jpg" alt=""></div>
                <div class="col-6"><img class="mb-3 rounded" src="img/bg-img/16.jpg" alt=""></div>
              </div>
              <p>A versatile e-commerce shop template. It is very nicely designed with modern features &amp; coded with the latest technology.</p>
              <p>It nicely views on all devices with smartphones, tablets, laptops &amp; desktops.</p>
              <h6>Authors Help</h6>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae suscipit blanditiis facilis, est modi, maxime dolorem voluptatibus ea deserunt voluptate minima eaque quidem?</p>
              <h6>Buyers Help</h6>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus sint reiciendis minima iusto ex beatae. Odio ducimus eveniet excepturi quaerat optio totam repellat eligendi! Eaque veritatis omnis doloribus vitae dolore similique facere eos molestiae quibusdam perspiciatis.</p>
              <div class="contact-btn-wrap text-center">
                <p class="mb-2">For more information, submit a request.</p><a class="btn btn-primary w-100" href="contact.html"><i class="lni lni-life-ring me-2"></i>Submit A Query</a>
              </div>
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