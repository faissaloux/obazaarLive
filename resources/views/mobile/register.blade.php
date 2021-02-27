<!DOCTYPE html>
<html lang="{{ App::getLocale() }}" dir="{{ System::isRtl()?'rtl':'ltr' }}">
  
  @include('mobile/inc/head')
  <body>
    @include('mobile/inc/preloader')
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
              <form action="{{ route('mobile.registration') }}" method="post">
                @csrf
                <div class="form-group {{ System::isRtl() ? 'text-end':'text-start'}} mb-4"><span>{{ __('Username') }}</span>
                  <label for="username"><i class="lni lni-user"></i></label>
                  <input class="form-control" id="username" name="name" type="text" placeholder="{{ __('Username') }}">
                </div>
                <div class="form-group {{ System::isRtl() ? 'text-end':'text-start'}} mb-4"><span>{{ __('Email') }}</span>
                  <label for="email"><i class="lni lni-envelope"></i></label>
                  <input class="form-control" id="email" type="email" name="email" placeholder="email@example.com">
                </div>
                <div class="form-group {{ System::isRtl() ? 'text-end':'text-start'}} mb-4"><span>{{ __('Phone') }}</span>
                  <label for="password_confirmation"><i class="lni lni-phone"></i></label>
                  <input class="input-psswd form-control" id="registerPasswordConfirmation" name="phone" type="password" placeholder="{{ __('Phone') }}">
                </div>
                <div class="form-group {{ System::isRtl() ? 'text-end':'text-start'}} mb-4"><span>{{ __('Password') }}</span>
                  <label for="password"><i class="lni lni-lock"></i></label>
                  <input class="input-psswd form-control" id="registerPassword" name="password" type="password" placeholder="********************">
                </div>
                <div class="form-group {{ System::isRtl() ? 'text-end':'text-start'}} mb-4"><span>{{ __('Confirm Password') }}</span>
                  <label for="password_confirmation"><i class="lni lni-lock"></i></label>
                  <input class="input-psswd form-control" id="registerPasswordConfirmation" name="password_confirmation" type="password" placeholder="********************">
                </div>                
                <button class="btn btn-success btn-lg w-100" type="submit">{{ __('Sign Up') }}</button>
              </form>
            </div>
            <!-- Login Meta-->
            <div class="login-meta-data">
              <p class="mt-3 mb-0">{{__('Already have an account?')}}<a class="ms-1" href="{{ route('mobile.login-view') }}">{{ __('Sign In') }}</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('mobile/inc/scripts')
  </body>

</html>