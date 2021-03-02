@extends(\System::$ACTIVE_MOBILE_THEME_PATH.'/layouts/layout') 
@section('title')
{{ __('Password') }}
@endsection

@section('header-content')
<div class="back-button">
  <a href="{{ url()->previous() }}">
    <i class="lni {{ System::isRtl() ? 'lni-arrow-right':'lni-arrow-left'}}"></i>
  </a>
</div>
<div class="page-heading">
  <h6 class="mb-0">{{ __('Password') }}</h6>
</div>
@endsection

@section('content')
<div class="page-content-wrapper">
    <div class="container">
      <!-- Profile Wrapper-->
      <div class="profile-wrapper-area py-3">
        <!-- User Information-->
        <div class="card user-info-card">
          <div class="card-body p-4 d-flex align-items-center">
            <div class="user-profile me-3"><img src="{{ asset('assets/mobile/img/bg-img/9.png') }}" alt="">
              <div class="change-user-thumb">
                <form>
                  <input class="form-control-file" type="file">
                  <button><i class="lni lni-pencil"></i></button>
                </form>
              </div>
            </div>
            <div class="user-info">
              <h5 class="mb-0">{{ $user->name }}</h5>
            </div>
          </div>
        </div>
        <!-- User Meta Data-->
        <div class="card user-data-card">
          <div class="card-body">
            <form action="{{ route('mobile.account.profile.password.update') }}" method="post">
              @csrf
              <div class="mb-3">
                <div class="title mb-2"><i class="lni lni-lock"></i><span>{{ __('Old password') }}</span></div>
                <input class="form-control" type="password" name="password" placeholder="***********">
              </div>
              <div class="mb-3">
                <div class="title mb-2"><i class="lni lni-lock"></i><span>{{ __('New password') }}</span></div>
                <input class="form-control" type="password" name="newpassword" placeholder="***********">
              </div>
              <div class="mb-3">
                <div class="title mb-2"><i class="lni lni-lock"></i><span>{{ __('Password confirmation') }}</span></div>
                <input class="form-control" type="password" name="password_confirmation" placeholder="***********">
              </div>
              <button class="btn btn-success w-100" type="submit">{{ __('Save changes') }}</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection