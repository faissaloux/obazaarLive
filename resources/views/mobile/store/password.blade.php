@extends(\System::$ACTIVE_MOBILE_THEME_PATH.'/layouts/store_layout') 
@section('title')
    home
@endsection

@section('header-content')
  <div class="back-button">
    <a href="{{ url()->previous() }}">
        <svg class="bi bi-arrow-left" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"></path>
        </svg>
    </a>
  </div>
  <div class="page-heading">
    <h6 class="mb-0">Profile</h6>
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
          <form action="{{ route('mobile.store.profile.password.update', \Session::get('store')) }}" method="post">
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