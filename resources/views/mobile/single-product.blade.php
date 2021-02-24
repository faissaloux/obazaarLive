<!DOCTYPE html>
<html lang="en">

  @include('mobile/inc/head')
  <body class="@yield('bodyClass')  @if(Auth::check())  has-logged   @endif @if(!\System::shoppingCartIsNotEmpty()) cart-empty @endif">
    @include('mobile/inc/preloader')
    
    <!-- Header Area -->
   @include('mobile/components/headerAreaProductDetails')

   <!-- Nav Bar -->
   @include('mobile/components/navBar')
   
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
              <p class="sale-price mb-0">{{ $product->price }} €</p>
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

          <!-- Ratings-->
          {{-- <div class="product-ratings">
            <div class="container d-flex align-items-center justify-content-between">
              <div class="ratings"><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><span class="ps-1">3 ratings</span></div>
              <div class="total-result-of-ratings"><span>5.0</span><span>Very Good                                </span></div>
            </div>
          </div>
        </div> --}}

        <!-- Flash Sale Panel-->
        {{-- <div class="flash-sale-panel bg-white mb-3 py-3">
          <div class="container">
            <!-- Sales Offer Content-->
            <div class="sales-offer-content d-flex align-items-end justify-content-between">
              <!-- Sales End-->
              <div class="sales-end">
                <p class="mb-1 font-weight-bold"><i class="lni lni-bolt"></i> Flash sale end in</p>
                <!-- Please use event time this format: YYYY/MM/DD hh:mm:ss-->
                <ul class="sales-end-timer ps-0 d-flex align-items-center" data-countdown="2022/01/01 14:21:37">
                  <li><span class="days">0</span>d</li>
                  <li><span class="hours">0</span>h</li>
                  <li><span class="minutes">0</span>m</li>
                  <li><span class="seconds">0</span>s</li>
                </ul>
              </div>
              <!-- Sales Volume-->
              <div class="sales-volume text-end">
                <p class="mb-1 font-weight-bold">82% Sold Out</p>
                <div class="progress" style="height: 6px;">
                  <div class="progress-bar bg-warning" role="progressbar" style="width: 82%;" aria-valuenow="82" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
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
                <button type="button" class="down quantity-button-handler">-</button>
                <input class="quantity-ajax form-control instantQuantity cart-quantity-input" 
                  id="add-to-cart-quantity" 
                  name="quantity"  
                  data-product-id='{{ $product['id'] }}' data-price='{{ $product['price'] }}'  
                  type="text" 
                  placeholder="1" 
                  value="1">
                <button type="button" class="up quantity-button-handler">+</button>
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
      </div>
    </div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
    <!-- Footer Nav-->
    <div class="footer-nav-area" id="footerNav">
      <div class="container h-100 px-0">
        <div class="suha-footer-nav h-100">
          <ul class="h-100 d-flex align-items-center justify-content-between ps-0">
            <li class="active"><a href="home.html"><i class="lni lni-home"></i>Home</a></li>
            <li><a href="message.html"><i class="lni lni-life-ring"></i>Support</a></li>
            <li><a href="cart.html"><i class="lni lni-shopping-basket"></i>Cart</a></li>
            <li><a href="pages.html"><i class="lni lni-heart"></i>Pages</a></li>
            <li><a href="settings.html"><i class="lni lni-cog"></i>Settings</a></li>
          </ul>
        </div>
      </div>
    </div>
    @include('mobile/inc/scripts')
  </body>

</html>