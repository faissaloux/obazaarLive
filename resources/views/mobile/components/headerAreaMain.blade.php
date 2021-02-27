<!-- Header Area-->
<div class="header-area" id="headerArea">
  <div class="container h-100 d-flex align-items-center justify-content-between">
    <!-- Logo Wrapper-->
    <div class="logo-wrapper"><a href="/{{ \Session::get('store') }}">
      @php
      $logo = app('option')->get('logo');
      @endphp
      @if(!empty($logo))
      <a class="ps-logo" href="/">
      <img src="/uploads/{{ $logo }}" alt="">
      </a>
      @endif  
    </div>
    <!-- Search Form-->
    <div class="top-search-form">
      <form action="#" method="">
        <input class="form-control" type="search" placeholder="{{ __('Enter your keyword') }}">
        <button type="submit"><i class="fa fa-search"></i></button>
      </form>
    </div>
    <!-- Navbar Toggler-->
    <div class="suha-navbar-toggler d-flex flex-wrap" id="suhaNavbarToggler"><span></span><span></span><span></span></div>
  </div>
</div>