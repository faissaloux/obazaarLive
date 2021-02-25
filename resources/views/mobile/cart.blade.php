<!DOCTYPE html>
<html lang="en">
  
  <head>
    @include('mobile/inc/head')
  </head>
  <body class="@yield('bodyClass')  @if(Auth::check())  has-logged   @endif @if(!\System::shoppingCartIsNotEmpty()) cart-empty @endif" data-auth-id="{{ \System::userId() }}" data-slug="{{ \Session::get('store') }}" data-store-id="{{ \System::currentStoreId() }}">
    @include('mobile/inc/preloader')
    <!-- Header Area-->
    <div class="header-area" id="headerArea">
      <div class="container h-100 d-flex align-items-center justify-content-between">
        <!-- Back Button-->
        <div class="back-button"><a href="{{ url()->previous() }}">
            <svg class="bi bi-arrow-left" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"></path>
            </svg></a></div>
        <!-- Page Title-->
        <div class="page-heading">
          <h6 class="mb-0">My Cart</h6>
        </div>
        <!-- Navbar Toggler-->
        <div class="suha-navbar-toggler d-flex justify-content-between flex-wrap" id="suhaNavbarToggler"><span></span><span></span><span></span></div>
      </div>
    </div>

    <!-- Nav Bar -->
    @include('mobile/components/navBar')

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
                    <th scope="row"><a class="remove-product" href="#"><i class="lni lni-close"></i></a></th>
                    <td><a href="{{ route('mobile.store.product',['id' => $product->id , 'store' => \Session::get('store')]) }}"></a> <img src="{{ $product->thumbnail }}" alt=""></td>
                    <td>
                      <a href="{{ route('mobile.store.product',['id' => $product->id , 'store' => \Session::get('store')]) }}">
                        {{ $product->name }}
                        <div class="product-col-{{ $product['id'] }}">
                          <span class="ps-block__shipping product-qty ">
                            {{ $product->price }}€ × 
                            <i > {{ $product['qty'] }}</i> =
                            <i class="preis" >{{ $product['qty'] * $product->price }}</i>
                          </span>
                        </div>
                      </a>
                    </td>
                    <td>
                      <div class="form-group--number d-flex justify-content-between zaydnaks">
                        <button type="button" class="btn btn-warning down fix-pos">-</button>
                        <input class=" px-0 quantity-ajax form-control h-auto instantQuantity cart-quantity-input"
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
          <!-- Coupon Area-->
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
          </div>
          <!-- Cart Amount Area-->
          @if(ShoppingCart::all()->count() != 0)
            <div class="card cart-amount-area">
              <div class="card-body d-flex align-items-center justify-content-between">
                <h5 class="total-price mb-0">
                  <i class="TotalPrice"> {{ number_format((float)ShoppingCart::totalPrice(), 2, '.', '') }}</i>
                </h5>
                  <a class="btn btn-warning" href="#">{{ __('Go to Checkout') }}</a>
              </div>
            </div>
          @endif
        </div>
      </div>
    </div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
    
    {{-- Footer --}}
    @include('mobile/inc/footer')

    @include('mobile/inc/scripts')
  </body>

</html>