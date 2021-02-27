@extends(\System::$ACTIVE_MOBILE_THEME_PATH.'/layouts/store_layout') 
@section('title')
{{ __('order details') }}
@endsection

<style>
    .product-thumbnail-side img.product {
        height: 120px !important;
    }
    .card.weekly-product-card, .product-thumbnail-side, .product-thumbnail-side img, .product-thumbnail.d-block {
        height: initial !important;
    }
    .weekly-product-card .product-thumbnail-side {
        width: 35% !important;
        float: initial !important;
        max-width: 35% !important;
    }
</style>

@section('header-content')
<div class="back-button">
<a href="{{ url()->previous() }}">
    <svg class="bi bi-arrow-left" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"></path>
    </svg>
</a>
</div>
<div class="page-heading">
  <h6 class="mb-0">{{ __('order details') }}</h6>
</div>
@endsection

@section('content')
<div class="page-content-wrapper">
    <!-- Top Products-->
    <div class="top-products-area py-3">
      <div class="container">
        <div class="section-heading d-flex align-items-center justify-content-between">
          <h6>{{ __('order details') }}</h6>
          <!-- Layout Options-->
        </div>
        <div class="card mb-2">
            <div class="card-body">
              <div class="single-profile-data d-flex align-items-center justify-content-between">
                <div class="title d-flex align-items-center"><i class="lni lni-user"></i><span>{{ __('username') }}</span></div>
                <div class="data-content"> {{$content->addresse->given_name}} </div>
              </div>              
              <div class="single-profile-data d-flex align-items-center justify-content-between">
                <div class="title d-flex align-items-center"><i class="lni lni-phone"></i><span>{{ __('Phone') }}</span></div>
                <div class="data-content"> {{$content->addresse->phone}} </div>
              </div>
              <div class="single-profile-data d-flex align-items-center justify-content-between">
                <div class="title d-flex align-items-center"><i class="lni lni-wallet"></i><span>{{ __('order.method') }}</span></div>
                <div class="data-content">{{ $content->payement->method }}                                </div>
              </div>
              <div class="single-profile-data d-flex align-items-center justify-content-between">
                <div class="title d-flex align-items-center"><i class="lni lni-caravan"></i><span>{{ __('order.shipping') }}</span></div>
                <div class="data-content">{{ $content->shipping->name }} <br> {{ $content->currency }} {{ $content->shipping->cost }} </div>
              </div>
              <div class="single-profile-data d-flex align-items-center justify-content-between">
                <div class="title d-flex align-items-center"><i class="lni lni-map-marker"></i><span>{{ __('adresse') }}</span></div>
                <div class="data-content">{{ $content->addresse->street }}, {{ $content->addresse->city }}, {{ $content->addresse->state }} , {{ $content->addresse->country_code }} , {{ $content->addresse->postal_code }} .</div>
              </div>
            </div>
          </div>
        @foreach($content->products as $product )

        <div class="col-12 col-md-6 mb-2">
            <div class="card weekly-product-card">
            <div class="card-body d-flex align-items-center">
                <div class="product-thumbnail-side">
                    {!! $product->product->presentThumbnail() !!}
                </div>
                <div class="product-description"><a class="product-title d-block" href="single-product.html">{{ $product->product->name }}</a>
                <p class="sale-price"> <i>{{ System::currency() }}</i> {{ $product->product->price }}</p>
                <div class="product-rating"><i class="lni lni-shopping-basket"></i>{{ $product->quantity }}</div>                
                </div>
            </div>
            </div>
        </div>
        @endforeach
        <div class="col-12 col-md-6 ">
            <div class="card weekly-product-card">
            <div class="card-body align-items-center">
                <div class="row">
                    <div class="col-4">{{ __('total') }} </div>
                    <div class="col-6"><i class="lni lni-euro"></i> {{ $content->total }}</div>
                </div>
            </div>
            </div>
        </div>

      </div>
    </div>
  </div>
@endsection