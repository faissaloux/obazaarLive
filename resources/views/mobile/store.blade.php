@extends(\System::$ACTIVE_MOBILE_THEME_PATH.'/layouts/store_layout') 
@section('title')
    o-bazaar | {{\Session::get('store')}}
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
<div class="top-search-form">
  <form action="{{ route('mobile.store.searchSubmit' , ['store' => \Session::get('store')]) }}" method="GET">
    <input class="form-control" type="search" name="q" placeholder="{{ __('Search...') }}">
    <button type="submit"><i class="fa fa-search"></i></button>
  </form>
</div>
@endsection

@section('content')

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
        {!! app('SiteSetting')->storecategoriesMobile() !!}
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
                <!--div class="product-rating">
                  <i class="lni lni-star-filled"></i>
                  <i class="lni lni-star-filled"></i>
                  <i class="lni lni-star-filled"></i>
                  <i class="lni lni-star-filled"></i>
                  <i class="lni lni-star-filled"></i>
                </div-->
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