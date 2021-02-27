@extends(\System::$ACTIVE_MOBILE_THEME_PATH.'/layouts/store_layout') 
@section('title')
Adressen
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
    <svg class="bi bi-arrow-left" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"></path>
    </svg>
</a>
</div>
<div class="page-heading">
  <h6 class="mb-0">Adressen</h6>
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
                        <a class="col-md-6 adresses-btn btn btn-success btn-sm" href="{{ route('mobile.store.adresses.edit',['id' =>  $addresse->id , 'store' => \Session::get('store')  ]) }}"></i>{{ __('Edit') }}</a>
                        <a class="col-md-6 adresses-btn btn btn-success btn-sm" href="{{ route('mobile.store.adresses.delete',['id' =>  $addresse->id , 'store' => \Session::get('store')  ]) }}"></i>{{ __('Delete') }}</a>
                    </div>
                    
                    @if(!$addresse->is_primary) 
                        <div class="row">
                            <a class="col-md-12 adresses-btn btn btn-success btn-sm" href="{{ route('mobile.store.adresses.default',['id' =>  $addresse->id , 'store' => \Session::get('store') ]) }}">{{ __('set As Default') }}</a>
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
                <a class="btn btn-danger w-100" href="{{ route('mobile.store.adresses.create', [  'store' => \Session::get('store')]) }}">{{ __('+ New Address') }}</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection