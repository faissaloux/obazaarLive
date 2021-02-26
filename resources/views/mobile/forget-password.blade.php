<!DOCTYPE html>
<html lang="en">
  
  @include('mobile/inc/head')
  <body>
    @include('mobile/inc/preloader')
    <!-- Login Wrapper Area-->
    <div class="login-wrapper d-flex align-items-center justify-content-center text-center">               
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-sm-9 col-md-7 col-lg-6 col-xl-5"><img class="big-logo" src="img/core-img/logo-white.png" alt="">
            <!-- Register Form-->
            <div class="register-form mt-5 px-4">
              <form action="{{ route('mobile.forget-password') }}" method="post">
                @csrf
                <div class="form-group text-start mb-4"><span>Email</span>
                  <label for="email"><i class="lni lni-user"></i></label>
                  <input class="form-control" id="email" name="email" type="text" placeholder="Email">
                </div>
                <button class="btn btn-warning btn-lg w-100" type="submit">Reset Password</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('mobile/inc/scripts')
  </body>

</html>