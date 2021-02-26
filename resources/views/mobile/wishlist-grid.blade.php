@extends(\System::$ACTIVE_MOBILE_THEME_PATH.'/layouts/layout') 
@section('title')
    Wishlist
@endsection

@section('content')
  <div class="page-content-wrapper">
    <!-- Products-->
    <div class="top-products-area py-3">
      <div class="container">
        <div class="section-heading d-flex align-items-center justify-content-between">
          @if($wishlist->count() != 0)
              <div class="ps-section__header">
                <h3>{{ __('Wishlist') }} ( {{$wishlist->count()}} )</h3>
              </div>
          @endif
          <!-- Layout Options-->
          <div class="layout-options">
            <a class="active" href="{{ route('mobile.store.wishlist.grid' ,[  'store' => \Session::get('store')] ) }}"><i class="lni lni-grid-alt"></i></a>
            <a href="{{ route('mobile.store.wishlist.list' ,[  'store' => \Session::get('store')] ) }}"><i class="lni lni-radio-button"></i></a>
          </div>
        </div>
        <div class="row g-3">
          <!-- Wishlist Product -->
          @if($wishlist->count() != 0)
            @foreach($wishlist as $wishlistItem)
              <div class="col-6 col-md-4 col-lg-3">
                <div class="card top-product-card">
                  <div class="card-body">
                    <a class="btn btn-danger"
                      href="{{ route('mobile.store.wishlist.remove', [  'store' => \Session::get('store'), 'id' => $wishlistItem->id ]) }}">
                      <i class="fa fa-trash"></i>
                    </a>
                    <a class="product-thumbnail d-block" href="{{ route('mobile.store.product', ['store' => \Session::get('store'), 'id' => $wishlistItem->product->id]) }}">
                      <img class="mb-2" src="{{ $wishlistItem->product->thumbnail }}">
                    </a>
                    <a class="product-title d-block" href="{{ route('mobile.store.product', ['store' => \Session::get('store'), 'id' => $wishlistItem->product->id]) }}">{{ $wishlistItem->product->name }}</a>
                    <p class="sale-price">{{ $wishlistItem->product->price }} €</p>
                    
                    <a class="btn btn-success btn-sm" 
                      id="addtocard"
                      href="{{ route('mobile.store.cart.add', ['id' => $wishlistItem->product->id , 'store' => \Session::get('store')]) }}" 
                      data-product-id='{{$wishlistItem->product->id}}'>
                      <i class="lni lni-plus"></i>
                    </a>
                  </div>
                </div>
              </div>
            @endforeach
          @else
            <div class="ps-table--invoices">
                <div class="row text-center">
                    <div class="empty-order">
                        <i class="icon-heart"></i>
                        <p>{{ __('You have no favorites') }}</p>
                        <a class="ps-btn" href="/{{ \Session::get('store') }}">{{ __('Continue Shopping') }}</a>
                    </div>
                </div>
            </div>
          @endif
          <!-- Select All Products-->
          @if($wishlist->count() != 0)
            <div class="col-12">
              <div class="select-all-products-btn"><a class="btn btn-danger w-100"  href="{{ route('mobile.store.wishlist.clear',['store' => \Session::get('store') ]) }}">
                <i class="fa fa-trash" aria-hidden="true"></i>{{ __('clear wishlist') }}</a></div>
            </div>
          @endif
            
        </div>
      </div>
    </div>
  </div>
@endsection