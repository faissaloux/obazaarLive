@extends(\System::$ACTIVE_MOBILE_THEME_PATH.'/layouts/layout') 
@section('title')
    Wishlist
@endsection

@section('content')
  <div class="page-content-wrapper">
    <!-- Top Products-->
    <div class="top-products-area py-3">
      <div class="container">
        <div class="section-heading d-flex align-items-center justify-content-between">
          @if($wishlist->count() != 0)
              <div class="ps-section__header">
                <h3>{{ __('Wishlist') }} ( {{$wishlist->count()}} )</h3>
              </div>
          @endif

        </div>
        <div class="row g-3">
          <!-- Wishlist Product -->
          @if($wishlist->count() != 0)
            @foreach($wishlist as $wishlistItem)
              <div class="col-12 col-md-6">
                <div class="card weekly-product-card">
                  <div class="card-body d-flex align-items-center">
                    <div class="product-thumbnail-side">
                      <a class="product-thumbnail d-block"  href="{{ route('mobile.store.product',['id' => $wishlistItem->productID , 'store' => \Session::get('store')]) }}">
                        <img class="h-auto mb-2" src="{{ $wishlistItem->product->thumbnail }}">
                      </a>
                    </div>
                    <div class="product-description">
                      <a class="product-title d-block" href="{{ route('mobile.store.product',['id' => $wishlistItem->productID , 'store' => \Session::get('store')]) }}">{{$wishlistItem->product->name }}</a>
                      <p class="sale-price">{{ $wishlistItem->product->price }} €</p>
                      <a class="btn btn-success btn-sm" 
                        id="addtocard"
                        href="{{ route('mobile.store.cart.add', ['id' => $wishlistItem->product->id , 'store' => \Session::get('store')]) }}" 
                        data-product-id='{{$wishlistItem->product->id}}'>
                        <i class="lni lni-plus"></i> Buy Now
                      </a>
                      <a class="btn btn-danger btn-sm"  
                        href="{{ route('mobile.store.wishlist.remove', [  'store' => \Session::get('store'), 'id' => $wishlistItem->id ]) }}">
                        <i class="icon-cross"></i> Remove From Wishlist
                      </a>
                      </div>
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
                        <a class="ps-btn" href="/{{\Session::get('store') }}">{{ __('Continue Shopping') }}</a>
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