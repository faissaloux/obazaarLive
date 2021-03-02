@extends(\System::$ACTIVE_MOBILE_THEME_PATH.'/layouts/store_layout') 
@section('title')
  {{ $product->name }}
@endsection

@section('header-content')
<div class="back-button">
  <a href="{{ url()->previous() }}">
    <i class="lni {{ System::isRtl() ? 'lni-arrow-right':'lni-arrow-left'}}"></i>
  </a>
</div>
<div class="page-heading">
  <h6 class="mb-0">{{ $product->name }}</h6>
</div>
@endsection

<style>
  .owl-item {
      background: #e7e9f5 !important;
  }

  .owl-item .single-product-slide {
      width: 300px;
      height: 300px;
      border-radius: 300px;
      margin: 0px auto;
      margin-top: 30px;
      margin-bottom: 50px;
  }
</style>

@section('content')
<div class="page-content-wrapper">
  <!-- Product Slides-->
  <div class="product-slides owl-carousel">
    <!-- Single Hero Slide-->
    <div class="single-product-slide" style="background-image: url('{{ $product->thumbnail }}')"></div>
    <!-- Single Hero Slide-->
    <div class="single-product-slide" style="background-image: url('{{ $product->thumbnail }}')"></div>
    <!-- Single Hero Slide-->
    <div class="single-product-slide" style="background-image: url('{{ $product->thumbnail }}')"></div>
  </div>
  <div class="product-description pb-3">
    <!-- Product Title & Meta Data-->
    <div class="product-title-meta-data bg-white mb-3 py-3">
      <div class="container d-flex justify-content-between">
        <div class="p-title-price">
          <h6 class="mb-1">{{ $product->name }}</h6>
          <p class="sale-price mb-0">{{ $product->price }} {{ System::currency() }}</p>
        </div>
        <div class="p-wishlist-share">
          <a class="wishlist-btn" 
            id="wishlistMb"  
            href="javascript:;" 
            data-link="{{ route('mobile.store.wishlist.add', ['store' => \Session::get('store'), 'id' => $product->id ]) }}">
            <i class="lni lni-heart"></i>
          </a>
        </div>
      </div>
    </div>

      <!-- Ratings-->
      {{-- <div class="product-ratings">
        <div class="container d-flex align-items-center justify-content-between">
          <div class="ratings"><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><span class="ps-1">3 ratings</span></div>
          <div class="total-result-of-ratings"><span>5.0</span><span>Very Good                                </span></div>
        </div>
      </div>
    </div> --}}


    <!-- Add To Cart-->
    <div class="cart-form-wrapper bg-white mb-3 py-3">
      <form class="m-2 cart-form"
        id="addToCartForm"
        data-link="{{ route('mobile.store.cart.add', ['id' => $product->id , 'store' => \Session::get('store') ]) }}"
        method="post">
        {{ csrf_field() }}
        <div class="form-group--number zaydnaks order-plus-minus d-flex align-items-center">
            <button type="button" class="down btn-warning btn">-</button>
            <input class="quantity-ajax form-control instantQuantity cart-quantity-input" 
              id="add-to-cart-quantity" 
              name="quantity"  
              data-product-id='{{ $product['id'] }}' data-price='{{ $product['price'] }}'  
              type="text" 
              placeholder="1" 
              value="1">
            <button type="button" class="up btn-warning btn">+</button>
        </div>
        <button class="btn btn-danger ms-auto">{{ __('cart.add') }}</button>
        <a class="ps-btn" style="display: none;" href="#">{{ __('Buy now') }}</a>
        <div class="ps-product__actions">
          <a class="wishlist-btn" 
            id="wishlistMb"  
            href="javascript:;" 
            title="{{ __('wishlist.add') }}"
            data-link="{{ route('mobile.store.wishlist.add', ['store' => \Session::get('store'), 'id' => $product->id ]) }}">
            <i class="lni lni-heart" style="display: none;"></i>
          </a>
        </div> 
    </form>
      {{-- <div class="container">
        <div class="order-plus-minus d-flex align-items-center">
          <div class="quantity-button-handler">-</div>
          <input class="form-control cart-quantity-input" type="text" step="1" name="quantity" value="3">
          <div class="quantity-button-handler">+</div>
        </div>
        <a class="btn btn-success btn-sm" 
          id="addtocardMb"
          href="{{ route('mobile.store.cart.add', ['id' => $product->id , 'store' => \Session::get('store')]) }}" 
          data-product-id='{{$product->id}}'>
            <i class="lni lni-plus"></i>
        </a>
      </div> --}}
    </div>
    <!-- Product Specification-->
    <div class="p-specification bg-white mb-3 py-3">
      <div class="container">
        <h6>{{ __('Description') }}</h6>
        <p>{!! $product->description !!}</p>
      </div>
    </div>
    <!-- Flash Sale Slide-->
    <div class="flash-sale-wrapper">
      <div class="container">
          <!-- Flash Sale Slide-->
          <h6>{{ __('Featured Products') }}</h6>
          <div class="flash-sale-slide owl-carousel">
            <!-- Single Flash Sale Card-->
            @foreach($related->chunk(1) as $items)
            <div class="card flash-sale-card">            
              @foreach($items as $product)
                  <div class="card-body">
                      <a href="{{ route('mobile.store.product', ['store' => \Session::get('store'), 'id' => $product->id]) }}"><img src="{{ $product->thumbnail }}" alt=""><span class="product-title">{{ $product->name }}</span>
                        <p class="sale-price">$7.99<span class="real-price">$15</span></p>
                      </a>
                  </div>
              @endforeach                                         
            </div>
            @endforeach
          </div>
        </div>
      </div>

  </div>
  
@endsection