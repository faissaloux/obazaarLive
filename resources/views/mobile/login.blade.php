<!DOCTYPE html>
<html lang="{{ App::getLocale() }}" dir="{{ System::isRtl()?'rtl':'ltr' }}">
  
  @include('mobile/inc/head')
  <body>
    @include('mobile/inc/preloader')
    @include(\System::$ACTIVE_MOBILE_THEME_PATH.'/inc/alert')
    <!-- Login Wrapper Area-->
    <div class="login-wrapper d-flex align-items-center justify-content-center text-center">
      <!-- Background Shape-->
      <div class="background-shape"></div>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-sm-9 col-md-7 col-lg-6 col-xl-5">
            @php
            $logo = app('option')->get('logo');
            @endphp
            @if(!empty($logo))
            <a href="/">
            <img width="100px" src="/uploads/{{ $logo }}" alt="">
            </a>
            @endif
            <!-- Register Form-->
            <div class="register-form mt-5 px-4">
              <form action="{{ route('mobile.login-auth') }}" method="post">
                @csrf
                 
                <div class="form-group {{ System::isRtl() ? 'text-end':'text-start'}} mb-4"><span>{{ __('Email') }}</span>
                  <label for="email"><i class="lni lni-user"></i></label>
                  <input class="form-control" name="email" id="username" type="text" placeholder="info@example.com">
                </div>
                <div class="form-group {{ System::isRtl() ? 'text-end':'text-start'}} mb-4"><span>{{ __('Password') }}</span>
                  <label for="password"><i class="lni lni-lock"></i></label>
                  <input class="form-control" name="password" id="password" type="password" placeholder="********************">
                </div>
                <button class="btn btn-success btn-lg w-100" type="submit">{{ __('LOGIN') }}</button>
              </form>
            </div>
            <!-- Login Meta-->
            <div class="login-meta-data"><a class="forgot-password d-block mt-3 mb-1" href="{{ route('mobile.forget-password-view') }}">{{ __('Forgot Password') }} ?</a>
              <p class="mb-0"> {{ __('Didnt have an account?') }} <a class="ms-1" href="{{ route('mobile.register-view') }}">{{ __('Register') }}</a></p>
            </div>
            <!-- View As Guest-->
            <div class="view-as-guest mt-3"><a class="btn" href="{{ route('mobile.categories') }}">{{ __('View as Guest') }}</a></div>
          </div>
        </div>
      </div>
    </div>
    @include('mobile/inc/scripts')
  </body>

</html>