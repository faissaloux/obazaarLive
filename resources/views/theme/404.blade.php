@extends(\System::$ACTIVE_MOBILE_THEME_PATH.'/layouts/store_layout') 
@section('title')
    404
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
    <h6 class="mb-0">404</h6>
  </div>
@endsection

@section('content')

<div class="page-content-wrapper">
    <div class="container">
      <!-- Offline Area-->
      <div class="offline-area-wrapper py-3 d-flex align-items-center justify-content-center">
        <div class="offline-text text-center"><img class="mb-4 px-5" src="{{ asset('assets/mobile/img/bg-img/404.png') }}" alt="">
          <h5>ohh! page not found</h5>
          <p>It seems we can't find what you're looking for. Perhaps searching can help or go back to</p><a class="btn btn-primary" href="/">Back Home</a>
        </div>
      </div>
    </div>
  </div>

@endsection