<!DOCTYPE html>
<html lang="en">

  @include('mobile/inc/head')
  <body>
    @include('mobile/inc/preloader')
    <!-- Header Area-->
    <div class="header-area" id="headerArea">
      <div class="container h-100 d-flex align-items-center justify-content-between">
        <!-- Back Button-->
        <div class="back-button"><a href="blog-grid.html">
            <svg class="bi bi-arrow-left" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"></path>
            </svg></a></div>
        <!-- Page Title-->
        <div class="page-heading">
          <h6 class="mb-0">Blog Details</h6>
        </div>
        <!-- Navbar Toggler-->
        <div class="suha-navbar-toggler d-flex justify-content-between flex-wrap" id="suhaNavbarToggler"><span></span><span></span><span></span></div>
      </div>
    </div>
    
    <!-- NavBar -->
    @include('mobile/components/navBar')
    <div class="page-content-wrapper">
      <div class="blog-details-post-thumbnail" style="background-image: url('img/bg-img/6.jpg')">
        <div class="container">
          <div class="post-bookmark-wrap">
            <!-- Post Bookmark--><a class="post-bookmark" href="#"><i class="lni lni-bookmark"></i></a>
          </div>
        </div>
      </div>
      <div class="product-description pb-3">
        <!-- Product Title & Meta Data-->
        <div class="product-title-meta-data bg-white mb-3 py-3">
          <div class="container">
            <h5 class="post-title">Bridal shopping is the latest trends of this month.</h5><a class="post-catagory mb-3 d-block" href="#">Shopping</a>
            <div class="post-meta-data d-flex align-items-center justify-content-between"><a class="d-flex align-items-center" href="#"><img src="img/bg-img/9.jpg" alt="">Sarah<span>Follow</span></a><span class="d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock me-1" viewBox="0 0 16 16">
<path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
</svg>4 min read</span></div>
          </div>
        </div>
        <div class="post-content bg-white py-3 mb-3">
          <div class="container">
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Soluta delectus distinctio officiis! Quisquam blanditiis voluptatibus, quod doloribus modi, impedit in dolores voluptates, aliquam facilis architecto eligendi laudantium eos!</p>
            <h6>The top shopping deals is the year 2021.</h6>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsum necessitatibus dicta adipisci tempora beatae impedit similique qui sit, ea possimus eos odit, voluptatum totam voluptates iure quo?</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis cupiditate quis molestias molestiae minus vel, ipsam corporis aut error libero tenetur facere assumenda soluta esse? Perferendis, eum!</p><a class="mb-3 d-block h6" href="#">How to easily buy a product?</a>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto quasi quas eligendi adipisci quaerat totam. Veritatis ratione a numquam molestias, sit at molestiae excepturi totam dolore, hic fugiat. Incidunt modi odit iure ipsam amet illo placeat laboriosam.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet porro, consectetur cum ea aut dolores officia magni laudantium, sed hic ad nulla laborum quam minima voluptatum, labore ipsam.</p>
          </div>
        </div>
        <!-- All Comments-->
        <div class="rating-and-review-wrapper bg-white py-3 mb-3">
          <div class="container">
            <h6>Comments (3)</h6>
            <div class="rating-review-content">
              <ul class="ps-0">
                <li class="single-user-review d-flex">
                  <div class="user-thumbnail mt-0"><img src="img/bg-img/7.jpg" alt=""></div>
                  <div class="rating-comment">
                    <p class="comment mb-0">Very good product. It's just amazing!</p><span class="name-date">Designing World 12 Dec 2021</span>
                  </div>
                </li>
                <li class="single-user-review d-flex">
                  <div class="user-thumbnail mt-0"><img src="img/bg-img/8.jpg" alt=""></div>
                  <div class="rating-comment">
                    <p class="comment mb-0">Very excellent product. Love it.</p><span class="name-date">Designing World 8 Dec 2021</span>
                  </div>
                </li>
                <li class="single-user-review d-flex">
                  <div class="user-thumbnail mt-0"><img src="img/bg-img/9.jpg" alt=""></div>
                  <div class="rating-comment">
                    <p class="comment mb-0">What a nice product it is. I am looking it's.</p><span class="name-date">Designing World 28 Nov 2021</span>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <!-- Comment Form-->
        <div class="ratings-submit-form bg-white py-3">
          <div class="container">
            <h6>Submit A Comment</h6>
            <form action="#" method="">
              <div class="mb-3">
                <textarea class="form-control" id="comments" name="comment" cols="30" rows="10" placeholder="Write your comment..."></textarea>
              </div>
              <button class="btn btn-sm btn-primary" type="submit">Post Comment</button>
            </form>
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