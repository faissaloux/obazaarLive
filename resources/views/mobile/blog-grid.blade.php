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
          <h6 class="mb-0">Blog Grid</h6>
        </div>
        <!-- Navbar Toggler-->
        <div class="suha-navbar-toggler d-flex justify-content-between flex-wrap" id="suhaNavbarToggler"><span></span><span></span><span></span></div>
      </div>
    </div>
    
    <!-- NavBar -->
    @include('mobile/components/navBar')
    <div class="page-content-wrapper">
      <!-- Blog Wrapper-->
      <div class="blog-wrapper py-3">
        <div class="container">
          <div class="section-heading d-flex align-items-center justify-content-between">
            <h6>Blog Grid</h6>
            <!-- Layout Options-->
            <div class="layout-options"><a class="active" href="blog-grid.html"><i class="lni lni-grid-alt"></i></a><a href="blog-list.html"><i class="lni lni-radio-button"></i></a></div>
          </div>
          <div class="row g-3">
            <!-- Single Blog Card-->
            <div class="col-6 col-md-4 col-lg-3">
              <div class="card blog-card">
                <!-- Post Image-->
                <div class="post-img"><img src="img/bg-img/18.jpg" alt=""></div>
                <!-- Post Bookmark--><a class="post-bookmark" href="#"><i class="lni lni-bookmark"></i></a>
                <!-- Post Content-->
                <div class="post-content">
                  <div class="bg-shapes">
                    <div class="circle1"></div>
                    <div class="circle2"></div>
                    <div class="circle3"></div>
                    <div class="circle4"></div>
                  </div>
                  <!-- Post Catagory--><a class="post-catagory d-block" href="#">Review</a>
                  <!-- Post Title--><a class="post-title d-block" href="blog-details.html">The 5 best reviews in Suha</a>
                  <!-- Post Meta-->
                  <div class="post-meta d-flex align-items-center justify-content-between flex-wrap mb-3"><a href="#"><i class="lni lni-user"></i>Yasin</a><span><i class="lni lni-timer"></i>2 min</span></div>
                  <!-- Read More Button--><a class="btn btn-primary btn-sm read-more-btn" href="blog-details.html">Read More</a>
                </div>
              </div>
            </div>
            <!-- Single Blog Card-->
            <div class="col-6 col-md-4 col-lg-3">
              <div class="card blog-card">
                <!-- Post Image-->
                <div class="post-img"><img src="img/bg-img/19.jpg" alt=""></div>
                <!-- Post Bookmark--><a class="post-bookmark" href="#"><i class="lni lni-bookmark"></i></a>
                <!-- Post Content-->
                <div class="post-content">
                  <div class="bg-shapes">
                    <div class="circle1"></div>
                    <div class="circle2"></div>
                    <div class="circle3"></div>
                    <div class="circle4"></div>
                  </div>
                  <!-- Post Catagory--><a class="post-catagory d-block" href="#">Shopping</a>
                  <!-- Post Title--><a class="post-title d-block" href="blog-details.html">The best deals of this week</a>
                  <!-- Post Meta-->
                  <div class="post-meta d-flex align-items-center justify-content-between flex-wrap mb-3"><a href="#"><i class="lni lni-user"></i>Admin</a><span><i class="lni lni-timer"></i>8 min</span></div>
                  <!-- Read More Button--><a class="btn btn-success btn-sm read-more-btn" href="blog-details.html">Read for $0.7</a>
                </div>
              </div>
            </div>
            <!-- Single Blog Card-->
            <div class="col-6 col-md-4 col-lg-3">
              <div class="card blog-card">
                <!-- Post Image-->
                <div class="post-img"><img src="img/bg-img/20.jpg" alt=""></div>
                <!-- Post Bookmark--><a class="post-bookmark" href="#"><i class="lni lni-bookmark"></i></a>
                <!-- Post Content-->
                <div class="post-content">
                  <div class="bg-shapes">
                    <div class="circle1"></div>
                    <div class="circle2"></div>
                    <div class="circle3"></div>
                    <div class="circle4"></div>
                  </div>
                  <!-- Post Catagory--><a class="post-catagory d-block" href="#">Tips</a>
                  <!-- Post Title--><a class="post-title d-block" href="blog-details.html">5 tips for buy original products</a>
                  <!-- Post Meta-->
                  <div class="post-meta d-flex align-items-center justify-content-between flex-wrap mb-3"><a href="#"><i class="lni lni-user"></i>Niloy</a><span><i class="lni lni-timer"></i>5 min</span></div>
                  <!-- Read More Button--><a class="btn btn-success btn-sm read-more-btn" href="blog-details.html">Read for $0.9</a>
                </div>
              </div>
            </div>
            <!-- Single Blog Card-->
            <div class="col-6 col-md-4 col-lg-3">
              <div class="card blog-card">
                <!-- Post Image-->
                <div class="post-img"><img src="img/bg-img/21.jpg" alt=""></div>
                <!-- Post Bookmark--><a class="post-bookmark" href="#"><i class="lni lni-bookmark"></i></a>
                <!-- Post Content-->
                <div class="post-content">
                  <div class="bg-shapes">
                    <div class="circle1"></div>
                    <div class="circle2"></div>
                    <div class="circle3"></div>
                    <div class="circle4"></div>
                  </div>
                  <!-- Post Catagory--><a class="post-catagory d-block" href="#">Offer</a>
                  <!-- Post Title--><a class="post-title d-block" href="blog-details.html">Mega Deals: Up to 75% discount</a>
                  <!-- Post Meta-->
                  <div class="post-meta d-flex align-items-center justify-content-between flex-wrap mb-3"><a href="#"><i class="lni lni-user"></i>Dolly</a><span><i class="lni lni-timer"></i>1 min</span></div>
                  <!-- Read More Button--><a class="btn btn-primary btn-sm read-more-btn" href="blog-details.html">Read More</a>
                </div>
              </div>
            </div>
            <!-- Single Blog Card-->
            <div class="col-6 col-md-4 col-lg-3">
              <div class="card blog-card">
                <!-- Post Image-->
                <div class="post-img"><img src="img/bg-img/22.jpg" alt=""></div>
                <!-- Post Bookmark--><a class="post-bookmark" href="#"><i class="lni lni-bookmark"></i></a>
                <!-- Post Content-->
                <div class="post-content">
                  <div class="bg-shapes">
                    <div class="circle1"></div>
                    <div class="circle2"></div>
                    <div class="circle3"></div>
                    <div class="circle4"></div>
                  </div>
                  <!-- Post Catagory--><a class="post-catagory d-block" href="#">Trends</a>
                  <!-- Post Title--><a class="post-title d-block" href="blog-details.html">Bridal shopping is the latest trends of this month</a>
                  <!-- Post Meta-->
                  <div class="post-meta d-flex align-items-center justify-content-between flex-wrap mb-3"><a href="#"><i class="lni lni-user"></i>Sarah</a><span><i class="lni lni-timer"></i>9 min</span></div>
                  <!-- Read More Button--><a class="btn btn-primary btn-sm read-more-btn" href="blog-details.html">Read More</a>
                </div>
              </div>
            </div>
            <!-- Single Blog Card-->
            <div class="col-6 col-md-4 col-lg-3">
              <div class="card blog-card">
                <!-- Post Image-->
                <div class="post-img"><img src="img/bg-img/23.jpg" alt=""></div>
                <!-- Post Bookmark--><a class="post-bookmark" href="#"><i class="lni lni-bookmark"></i></a>
                <!-- Post Content-->
                <div class="post-content">
                  <div class="bg-shapes">
                    <div class="circle1"></div>
                    <div class="circle2"></div>
                    <div class="circle3"></div>
                    <div class="circle4"></div>
                  </div>
                  <!-- Post Catagory--><a class="post-catagory d-block" href="#">News</a>
                  <!-- Post Title--><a class="post-title d-block" href="blog-details.html">How to easily buy a product</a>
                  <!-- Post Meta-->
                  <div class="post-meta d-flex align-items-center justify-content-between flex-wrap mb-3"><a href="#"><i class="lni lni-user"></i>Suha</a><span><i class="lni lni-timer"></i>6 min</span></div>
                  <!-- Read More Button--><a class="btn btn-success btn-sm read-more-btn" href="blog-details.html">Read for $0.2</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="section-heading pt-3">
            <h6>Read by category</h6>
          </div>
          <div class="row g-3">
            <!-- Single Blog Catagory-->
            <div class="col-6 col-sm-4">
              <div class="card blog-catagory-card">
                <div class="card-body p-4"><a href="#"><i class="lni lni-quotation"></i><span class="d-block">Review</span></a></div>
              </div>
            </div>
            <!-- Single Blog Catagory-->
            <div class="col-6 col-sm-4">
              <div class="card blog-catagory-card">
                <div class="card-body p-4"><a href="#"><i class="lni lni-shopping-basket"></i><span class="d-block">Shopping</span></a></div>
              </div>
            </div>
            <!-- Single Blog Catagory-->
            <div class="col-6 col-sm-4">
              <div class="card blog-catagory-card">
                <div class="card-body p-4"><a href="#"><i class="lni lni-bulb"></i><span class="d-block">Tips</span></a></div>
              </div>
            </div>
            <!-- Single Blog Catagory-->
            <div class="col-6 col-sm-4">
              <div class="card blog-catagory-card">
                <div class="card-body p-4"><a href="#"><i class="lni lni-offer"></i><span class="d-block">Offer</span></a></div>
              </div>
            </div>
            <!-- Single Blog Catagory-->
            <div class="col-6 col-sm-4">
              <div class="card blog-catagory-card">
                <div class="card-body p-4"><a href="#"><i class="lni lni-bolt-alt"></i><span class="d-block">Trends</span></a></div>
              </div>
            </div>
            <!-- Single Blog Catagory-->
            <div class="col-6 col-sm-4">
              <div class="card blog-catagory-card">
                <div class="card-body p-4"><a href="#"><i class="lni lni-paperclip"></i><span class="d-block">News</span></a></div>
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