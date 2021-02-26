@extends(\System::$ACTIVE_MOBILE_THEME_PATH.'/layouts/layout') 
@section('title')
    home
@endsection

@section('content')
<div class="page-content-wrapper">
  <div class="container">
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
            <div class="card weekly-product-card">
              <div class="card-body d-flex align-items-center">
                <div class="product-thumbnail-side">
                  <a class="product-thumbnail d-block" href="{{ $store->slug }}">
                    <img class="h-auto" src="{{ asset('uploads/'.$store->thumbnail) }}" alt="">
                  </a>
                </div>
                <div class="product-description">
                  <a class="product-title d-block" href="{{ $store->slug }}">{{ $store->name }}</a>
                  <p class="product-description-location">
                    <i class="lni lni-map-marker"></i>
                    <span>{{ $store->street }}</span>
                  </p>
                  <p class="product-description-email">
                    <i class="lni lni-envelope"></i>
                    <span>{{ $store->owner->email }}</span>
                  </p>
                  <p class="product-description-phone">
                    <i class="lni lni-phone"></i>
                    <span>{{ $store->owner->phone }}</span>
                  </p>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection