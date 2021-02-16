<!DOCTYPE html>
<html lang="en">
  
  @include('mobile/inc/head')
  <body>
    @include('mobile/inc/preloader')
    <div class="intro-wrapper d-flex align-items-center justify-content-center text-center">
      <div class="background-shape"></div>
      <div class="container"><img class="big-logo" src="{{ asset('assets/mobile/img/core-img/logo-white.png') }}" alt=""></div>
    </div>
    <div class="get-started-btn"><a class="btn btn-success btn-lg w-100" href="{{ route('mobile.login-view') }}">Get Started</a></div>
    @include('mobile/inc/scripts')
  </body>

</html>