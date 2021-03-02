@extends(\System::$ACTIVE_MOBILE_THEME_PATH.'/layouts/store_layout') 
@section('title')
  {{ __('Adresses') }}
@endsection

<style>
    .weekly-product-card .product-description {
        width: 100% !important;
        max-width: initial !important;
        flex: initial !important;
    }
        a.col-md-12.adresses-btn.btn.btn-success.btn-sm {
        margin: 5px 1%;
        margin-bottom: 0;
        width: 98%;
    }

    a.col-md-6.adresses-btn.btn.btn-success.btn-sm {
        width: 48%;
        margin: 1%;
    }
</style>

@section('header-content')
<div class="back-button">
  <a href="{{ url()->previous() }}">
    <i class="lni {{ System::isRtl() ? 'lni-arrow-right':'lni-arrow-left'}}"></i>
  </a>
</div>
<div class="page-heading">
  <h6 class="mb-0">{{ __('Adresses') }}</h6>
</div>
@endsection

@section('content')
<div class="page-content-wrapper">
    <!-- Top Products-->
    <div class="top-products-area py-3">
      <div class="container">
        <div class="section-heading d-flex align-items-center justify-content-between">
          <h6>{{ __('Adresses Book') }}</h6>
          <!-- Layout Options-->
        </div>
        <div class="row g-3">
          <!-- Single Weekly Product Card-->
          @foreach(Auth::user()->addresses as $addresse)
          <div class="col-12 col-md-6">
            <div class="card weekly-product-card">
              <div class="card-body d-flex align-items-center">
                <div class="product-description"><p class="product-title d-block" >{{ $addresse->given_name }}</p>
                    <p class="sale-price"><i class="lni lni-home"></i>{{ $addresse->street }}</span></p>
                    <div class="product-rating">{{ $addresse->state }}, {{ $addresse->housenumber }} ,  {{ $addresse->city }} , {{ $addresse->postal_code }} <br> {{ $addresse->country_code }} .</div>
                    <p class="product-rating"><i class="lni lni-phone"></i>{{ $addresse->phone }}</span></p>
                    <div class="row">
                        <a class="col-md-6 adresses-btn btn btn-success btn-sm" href="{{ route('mobile.store.adresses.edit',['id' =>  $addresse->id , 'store' => $store, 'store_category' => $store_category  ]) }}"></i>{{ __('Edit') }}</a>
                        <a class="col-md-6 adresses-btn btn btn-success btn-sm" href="{{ route('mobile.store.adresses.delete',['id' =>  $addresse->id , 'store' => $store, 'store_category' => $store_category  ]) }}"></i>{{ __('Delete') }}</a>
                    </div>
                    
                    @if(!$addresse->is_primary) 
                        <div class="row">
                            <a class="col-md-12 adresses-btn btn btn-success btn-sm" href="{{ route('mobile.store.adresses.default',['id' =>  $addresse->id , 'store' => $store, 'store_category' => $store_category ]) }}">{{ __('set As Default') }}</a>
                        </div>
                    @endif
                </div>
              </div>
            </div>
          </div>
          @endforeach 

          <!-- Select All Products-->
          <div class="col-12">
            <div class="select-all-products-btn">
                <a class="btn btn-danger w-100" href="{{ route('mobile.store.adresses.create', ['store' => $store, 'store_category' => $store_category]) }}">{{ __('+ New Address') }}</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection