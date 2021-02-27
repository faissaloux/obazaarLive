@extends(\System::$ACTIVE_MOBILE_THEME_PATH.'/layouts/layout') 
@section('title')
    {{ __('Cart') }}
@endsection

@section('header-content')
<div class="back-button">
  <a href="{{ url()->previous() }}">
    <i class="lni {{ System::isRtl() ? 'lni-arrow-right':'lni-arrow-left'}}"></i>
  </a>
</div>
<div class="page-heading">
  <h6 class="mb-0">{{ __('order details') }}</h6>
</div>
@endsection

@section('content')
  <div class="page-content-wrapper">
      <div class="container">
        <!-- Cart Wrapper-->
        <div class="cart-wrapper-area py-3">
          <div class="cart-table card mb-3">
            <div class="table-responsive card-body">
              @if(ShoppingCart::all()->count() != 0)
              <table class="table mb-0"  id='cart-mobile'>
                <tbody>
                  @foreach(ShoppingCart::all() as $product)
                  <tr >
                    <th scope="row">
                      <a class="remove-product" 
                        href="{{ route('mobile.store.cart.remove', ['id' => $product->rawId() , 'store' => \Session::get('store') , 'product_id' => $product['id']] )  }}">
                          <i class="lni lni-close"></i>
                      </a>
                    </th>
                    <td><a href="{{ route('mobile.store.product',['id' => $product->id , 'store' => \Session::get('store')]) }}"></a> <img src="{{ $product->thumbnail }}" alt=""></td>
                    <td>
                      <a href="{{ route('mobile.store.product',['id' => $product->id , 'store' => \Session::get('store')]) }}">
                        {{ $product->name }}
                        <div class="product-col-{{ $product['id'] }}">
                          <span class="ps-block__shipping product-qty ">
                            {{ $product->price }}{{ System::currency() }} × 
                            <i class="updatedQty"> {{ $product['qty'] }}</i> =
                            <i class="preis" >{{ number_format($product['qty'] * $product->price, 2) }}</i>
                            <i>{{ System::currency() }}</i>
                          </span>
                        </div>
                      </a>
                    </td>
                    <td>
                      <div class="form-group--number d-flex justify-content-between zaydnaks">
                        <button type="button" class="btn btn-warning down fix-pos">-</button>
                        <input class="text-center px-0 quantity-ajax form-control h-auto instantQuantity cart-quantity-input"
                          type="text" 
                          value="{{ $product['qty'] }}"
                          name="quantity"  
                          data-product-id='{{ $product['id'] }}' 
                          data-price='{{ $product['price'] }}'
                          data-product="{{ $product->rawId() }}" >
                        <button type="button" class="btn btn-warning up fix-pos">+</button>
                      </div>
                    </td>
                  </tr>
                </tbody>
                @endforeach
              </table>
              {{-- <div class="ps-section__cart-actions">
                <a class="ps-btn" href="/{{ \Session::get('store') }}">
                  <i class=""></i> {{ __('Continue Shopping') }}
                </a>
                <a class="ps-btn ps-btn--outline" href="{{ route('cart_clear', ['store' => \Session::get('store')]) }}">
                  <i class="icon-cross"></i> {{ __('Clear Shopping Cart') }}
                </a>
              </div> --}}
            
            @else
                <div class="ps-table--invoices">
                  <div class="row text-center">
                        <div class="empty-order">
                            <i class="icon-cart"></i>
                            <p>{{ __('Your shopping cart is empty') }}</p>
                            <a class="ps-btn" href="/{{ \Session::get('store') }}">{{ __('Order now') }}</a>
                        </div>
                  </div>
                </div>
            @endif
            </div>
          </div>

          {{-- <!-- Coupon Area-->
          <div class="card coupon-card mb-3">
            <div class="card-body">
              <div class="apply-coupon">
                <h6 class="mb-0">Have a coupon?</h6>
                <p class="mb-2">Enter your coupon code here &amp; get awesome discounts!</p>
                <div class="coupon-form">
                  <form action="#">
                    <input class="form-control" type="text" placeholder="SUHA30">
                    <button class="btn btn-primary" type="submit">Apply</button>
                  </form>
                </div>
              </div>
            </div>
          </div> --}}

          <!-- Cart Amount Area-->
          @if(ShoppingCart::all()->count() != 0)
            <div class="card cart-amount-area">
              <div class="card-body d-flex align-items-center justify-content-between">
                <h5 class="total-price mb-0">
                  <i class="TotalPrice"> {{ number_format(ShoppingCart::totalPrice(), 2, '.', '') }}</i> <i>{{ System::currency() }}</i>
                </h5>
                  <a class="btn btn-warning" href="{{ route('mobile.store.checkout', \Session::get('store')) }}">{{ __('Go to Checkout') }}</a>
              </div>
            </div>
          @endif
        </div>
      </div>
    </div>
  @endsection