@extends(\System::$ACTIVE_MOBILE_THEME_PATH.'/layouts/store_layout') 
@section('title')
    home
@endsection

@section('header-content')
<div class="logo-wrapper">
  <a href="/">
      <img src="{{ asset('assets/mobile/img/core-img/logo-small.png') }}" alt="">
  </a>
</div>
<div class="top-search-form">
  <form action="#" method="">
    <input class="form-control" type="search" placeholder="Enter your keyword">
    <button type="submit"><i class="fa fa-search"></i></button>
  </form>
</div>
@endsection

@section('content')
<div class="toast pwa-install-alert shadow bg-white" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000" data-bs-autohide="true">
  <div class="toast-body">
    <div class="content d-flex align-items-center mb-2"><img src="img/icons/icon-72x72.png" alt="">
      <h6 class="mb-0">Add to Home Screen</h6>
      <button class="btn-close ms-auto" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
    </div><span class="mb-0 d-block">Add Suha on your mobile home screen. Click the<strong class="mx-1">"Add to Home Screen"</strong>button &amp; enjoy it like a regular app.</span>
  </div>
</div>
<div class="page-content-wrapper">
  <div class="container">
    <div class="pt-3">
      <div class="hero-slides owl-carousel">
        @foreach($sliders as $slider)
          <div class="single-hero-slide" style="background-image: url('{{ asset('uploads/'.$slider->image) }}')">
            <div class="slide-content h-100 d-flex align-items-center">
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
  <div class="flash-sale-wrapper mt-3">
    <div class="container">
      <div class="flash-sale-slide owl-carousel">
        {!! app('SiteSetting')->MerchantStoreCategories() !!}
      </div>
    </div>
  </div>
  <div class="top-products-area clearfix py-3">
    <div class="container">
      <div class="section-heading d-flex align-items-center justify-content-between">
        <h6>Top Products</h6><a class="btn btn-danger btn-sm" href="{{ route('mobile.store.products', ['store' => \Session::get('store')]) }}">View All</a>
      </div>
      <div class="row g-3">
        @foreach($products as $product)
          <div class="col-6 col-md-4 col-lg-3">
            <div class="card top-product-card">
              <div class="card-body">
                <a class="wishlist-btn" 
                  id="wishlistMb"  
                  href="javascript:;" 
                  data-link="{{ route('mobile.store.wishlist.add', ['store' => \Session::get('store'), 'id' => $product->id ]) }}">
                  <i class="lni lni-heart"></i>
                </a>
                <a class="product-thumbnail d-block" 
                  href="{{ route('mobile.store.product', ['store' => \Session::get('store'), 'id' => $product->id]) }}">
                  <img class="mb-2" src="{{ $product->thumbnail }}">
                </a>
                <a class="product-title d-block" href="single-product.html">{{ $product->name }}</a>
                <p class="sale-price">{{ $product->price }} €</p>
                <div class="product-rating">
                  <i class="lni lni-star-filled"></i>
                  <i class="lni lni-star-filled"></i>
                  <i class="lni lni-star-filled"></i>
                  <i class="lni lni-star-filled"></i>
                  <i class="lni lni-star-filled"></i>
                </div>
                <a class="btn btn-success btn-sm" 
                  id="addtocard"
                  href="{{ route('mobile.store.cart.add', ['id' => $product->id , 'store' => \Session::get('store')]) }}" 
                  data-product-id='{{$product->id}}'>
                    <i class="lni lni-plus"></i>
                </a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection