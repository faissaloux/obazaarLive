<!DOCTYPE html>
<html lang="en">
  
  @include('mobile/inc/head')
  <body>
    @include('mobile/inc/preloader')
    @include(\System::$ACTIVE_MOBILE_THEME_PATH.'/elements/alerts')
    <!-- Login Wrapper Area-->
    <div class="login-wrapper d-flex align-items-center justify-content-center text-center">
      <!-- Background Shape-->
      <div class="background-shape"></div>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-sm-9 col-md-7 col-lg-6 col-xl-5"><img class="big-logo" src="img/core-img/logo-white.png" alt="">
            <!-- Register Form-->
            <div class="register-form mt-5 px-4">
              <form action="{{ route('mobile.login-auth') }}" method="post">
                @csrf
                 
                <div class="form-group text-start mb-4"><span>Username</span>
                  <label for="username"><i class="lni lni-user"></i></label>
                  <input class="form-control" name="username" id="username" type="text" placeholder="info@example.com">
                </div>
                <div class="form-group text-start mb-4"><span>Password</span>
                  <label for="password"><i class="lni lni-lock"></i></label>
                  <input class="form-control" name="password" id="password" type="password" placeholder="********************">
                </div>
                <button class="btn btn-success btn-lg w-100" type="submit">Log In</button>
              </form>
            </div>
            <!-- Login Meta-->
            <div class="login-meta-data"><a class="forgot-password d-block mt-3 mb-1" href="{{ route('mobile.forget-password-view') }}">Forgot Password?</a>
              <p class="mb-0">Didn't have an account?<a class="ms-1" href="{{ route('mobile.register-view') }}">Register Now</a></p>
            </div>
            <!-- View As Guest-->
            <div class="view-as-guest mt-3"><a class="btn" href="{{ route('mobile.stores') }}">View as Guest</a></div>
          </div>
        </div>
      </div>
    </div>
    @include('mobile/inc/scripts')
  </body>

</html>