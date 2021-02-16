<!DOCTYPE html>
<html lang="en">
  
  @include('mobile/inc/head')
  <body>
    @include('mobile/inc/preloader')
    <div class="login-wrapper d-flex align-items-center justify-content-center text-center">               
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-sm-9 col-md-7 col-lg-6 col-xl-5">
            <div class="px-4">
              <!-- Success Check-->
              <div class="success-check"><i class="lni lni-emoji-smile"></i></div>
              <!-- Reset Password Message-->
              <p class="text-white mt-4 mb-4">Password recovery email is sent successfully. Please check your inbox!</p>
              <!-- Go Back Button--><a class="btn btn-warning" href="login.html">Go Home</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('mobile/inc/scripts')
  </body>

</html>