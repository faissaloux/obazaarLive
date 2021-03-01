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
        @foreach($stores as $store)
        <div class="col-12 col-md-6">
          <div class="card blog-card list-card store">
            <!-- Post Image-->
            <div class="post-img"><img src="{{ asset('uploads/'.$store->thumbnail) }}" alt=""></div>
            <!-- Read More Button--><a class="btn btn-danger btn-sm read-more-btn" href="{{ route('home', ['store_category' => $store_category, 'store' => $store->slug]) }}">{{ $store->name }}</a>
            <!-- Post Content-->
            <div class="post-content">
              <div class="bg-shapes">
                <div class="circle1"></div>
                <div class="circle2"></div>
                <div class="circle3"></div>
                <div class="circle4"></div>
              </div>
              <!-- Post Catagory--><a class="post-catagory d-block" href="{{ route('home', ['store_category' => $store_category, 'store' => $store->slug]) }}">{{ $store->name }}</a>
              <!-- Post Title--><a class="post-title d-block" href="{{ route('home', ['store_category' => $store_category, 'store' => $store->slug]) }}">{{ $store->street }}</a>
              <!-- Post Meta-->
              <div class="post-meta d-flex align-items-center justify-content-between flex-wrap"><a href="mailto:{{ $store->owner->email }}"><i >@</i>{{ $store->owner->email }}</a><span><i class="lni lni-phone"></i><a href="tel:{{$store->owner->phone}}">{{ $store->owner->phone }}</a></span></div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection