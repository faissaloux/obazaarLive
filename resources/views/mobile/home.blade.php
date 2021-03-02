@extends(\System::$ACTIVE_MOBILE_THEME_PATH.'/layouts/layout') 
@section('title')
    {{ env('APP_NAME') }}
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
    <h6 class="mb-0">O-Bazaar</h6>
  </div>
@endsection

@section('content')
<div class="page-content-wrapper">
  <div class="container" dir="ltr">
    <div class="pt-3">
      <!-- Hero Slides-->
      <div class="hero-slides owl-carousel">
        @foreach($sliders as $slider)
          <div class="single-hero-slide" style="background-image: url('{{ asset('uploads/'.$slider->image) }}')">
          </div>
        @endforeach
      </div>
    </div>
  </div>
  <!-- Weekly Best Sellers-->
  <div class="weekly-best-seller-area py-3">
    <div class="container">
      <div class="row g-3">
        @foreach($stores_categories as $category)
        <div class="col-12 col-md-6">
          <div class="card blog-card list-card store">
            <!-- Post Image-->
            <div class="post-img"><img src="{{ asset('uploads/'.$category->image) }}" alt=""></div>
            <!-- Post Content-->
            <div class="post-content">
              <div class="bg-shapes">
                <div class="circle1"></div>
                <div class="circle2"></div>
                <div class="circle3"></div>
                <div class="circle4"></div>
              </div>
              <!-- Post Catagory--><a class="post-catagory d-block" href="{{ $category->slug }}">{{ $category->name }}</a>
              <!-- Post Meta-->
            </div>
          </div>
        </div>
        @endforeach
        <div class="col-12 col-md-6">
          <div class="card blog-card list-card store">
            <!-- Post Image-->
            <div class="post-img"><img src="{{ asset('assets/website/img/store_category_default.jpg') }}" alt=""></div>
            <!-- Post Content-->
            <div class="post-content">
              <div class="bg-shapes">
                <div class="circle1"></div>
                <div class="circle2"></div>
                <div class="circle3"></div>
                <div class="circle4"></div>
              </div>
              <!-- Post Catagory--><a class="post-catagory d-block" href="{{ route('mobile.stores-default') }}">{{ __('Other') }}</a>
              <!-- Post Meta-->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection