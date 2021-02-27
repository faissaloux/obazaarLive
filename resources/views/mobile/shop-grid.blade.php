@extends(\System::$ACTIVE_MOBILE_THEME_PATH.'/layouts/store_layout') 
@section('title')
    home
@endsection

@section('header-content')
<div class="logo-wrapper">
  @php
  $logo = app('option')->get('logo');
  @endphp
  @if(!empty($logo))
  <a class="ps-logo" href="/">
  <img src="/uploads/{{ $logo }}" alt="">
  </a>
  @endif
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
  <!-- Top Products-->
  <div class="top-products-area py-3">
    <div class="container">
      <div class="section-heading d-flex align-items-center justify-content-between">
        <h6>All Products</h6>
        <!-- Select Product Catagory-->

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
                <a class="product-thumbnail d-block" href="{{ route('mobile.store.product', ['store' => \Session::get('store'), 'id' => $product->id]) }}">
                  <img class="mb-2" src="{{ $product->thumbnail }}">
                </a>
                <a class="product-title d-block" href="{{ route('mobile.store.product', ['store' => \Session::get('store'), 'id' => $product->id]) }}">{{ $product->name }}</a>
                <p class="sale-price">{{ $product->price }}</p>
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

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="pagination-center">
            {{ $products->links() }}
          </div>
        </div>
      </div>
    </div>
    


  </div>
</div>
@endsection