@extends(\System::$ACTIVE_MOBILE_THEME_PATH.'/layouts/layout') 
@section('title')
    home
@endsection

@section('header-content')
    <div class="logo-wrapper">
        <a href="/">
          @php
          $logo = app('option')->get('logo');
          @endphp
          @if(!empty($logo))
          <a class="ps-logo" href="/">
          <img src="/uploads/{{ $logo }}" alt="">
          </a>
          @endif
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
          <div class="user-profile me-3"><img src="{{ asset('assets/mobile/img/bg-img/9.jpg') }}" alt=""></div>
          <div class="user-info">
            <h5 class="mb-0">{{ $user->name }}</h5>
          </div>
        </div>
      </div>
      <!-- User Meta Data-->
      <div class="card user-data-card">
        <div class="card-body">
          <div class="single-profile-data d-flex align-items-center justify-content-between">
            <div class="title d-flex align-items-center"><i class="lni lni-user"></i><span>{{ __('Username') }}</span></div>
            <div class="data-content">{{ $user->name }}</div>
          </div>
          <div class="single-profile-data d-flex align-items-center justify-content-between">
            <div class="title d-flex align-items-center"><i class="lni lni-phone"></i><span>{{ __('Phone') }}</span></div>
            <div class="data-content">{{ $user->phone }}</div>
          </div>
          <div class="single-profile-data d-flex align-items-center justify-content-between">
            <div class="title d-flex align-items-center"><i class="lni lni-envelope"></i><span>{{ __('Email Address') }}</span></div>
            <div class="data-content">{{ $user->email }}</div>
          </div>
          <!-- Edit Profile-->
          <div class="edit-profile-btn mt-3"><a class="btn btn-info w-100" href="{{ route('mobile.account.profile.edit') }}"><i class="lni lni-pencil me-2"></i>{{ __('Edit Profile') }}</a></div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection