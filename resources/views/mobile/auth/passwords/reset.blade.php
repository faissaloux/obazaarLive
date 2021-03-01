<!DOCTYPE html>
<html lang="{{ App::getLocale() }}" dir="{{ System::isRtl()?'rtl':'ltr' }}"
  
  @include('mobile/inc/head')
  <body class="@yield('bodyClass')  @if(Auth::check())  has-logged   @endif @if(!\System::shoppingCartIsNotEmpty()) cart-empty @endif" data-auth-id="{{ \System::userId() }}" data-store-category="{{ \Session::get('store_category') }}" data-slug="{{ \Session::get('store') }}" data-store-id="{{ \System::currentStoreId() }}">
    @include('mobile/inc/preloader')
    <!-- Header Area-->
    <div class="header-area" id="headerArea"></div>

    <!-- PWA Install Alert-->
    @include('mobile/inc/alert')
    <div class="page-content-wrapper">
        <div class="container">
          <!-- Profile Wrapper-->
          <div class="profile-wrapper-area py-3">
            <!-- User Meta Data-->
            <div class="card user-data-card">
              <div class="card-body">
                <form action="/password/reset" method="post">
                  @csrf
                  <input class="form-control" type="hidden" name="token" value="{{ $token }}">
                  <div class="mb-3">
                      <div class="title mb-2"><i class="lni lni-lock"></i><span>{{ __('Email') }}</span></div>
                      <input class="form-control" type="email" name="email" placeholder="Email">
                    </div>
                    <div class="mb-3">
                      <div class="title mb-2"><i class="lni lni-lock"></i><span>{{ __('New password') }}</span></div>
                      <input class="form-control" type="password" name="password" placeholder="***********">
                    </div>
                    <div class="mb-3">
                      <div class="title mb-2"><i class="lni lni-lock"></i><span>{{ __('Password confirmation') }}</span></div>
                      <input class="form-control" type="password" name="password_confirmation" placeholder="***********">
                    </div>
                  <button class="btn btn-success w-100" type="submit">{{ __('Reset password') }}</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
    @include('mobile/inc/scripts')
  </body>

</html>