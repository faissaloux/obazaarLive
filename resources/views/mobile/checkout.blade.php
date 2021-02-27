@extends(\System::$ACTIVE_MOBILE_THEME_PATH.'/layouts/store_layout') 
@section('title')
    home
@endsection

@section('header-content')
  <div class="back-button">
    <a href="{{ url()->previous() }}">
        <svg class="bi bi-arrow-left" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"></path>
        </svg>
    </a>
  </div>
  <div class="page-heading">
    <h6 class="mb-0">{{ __('Billing Information') }}</h6>
  </div>
@endsection

@section('content')
<div class="page-content-wrapper">
  <div class="container">
    <form action="{{ route('mobile.store.checkout.pay',['store' => $store]) }}" method="post">
      @csrf
      <input type="hidden" name="paymentmethod" value="">
      <div class="checkout-wrapper-area py-3 checkout-step-1">
        <!-- Shipping address Choose-->
        <div class="shipping-method-choose mb-3">
          <div class="card shipping-method-choose-title-card bg-danger">
            <div class="card-body">
              <h6 class="text-center mb-0 text-white">{{ __('Addresses') }}</h6>
            </div>
          </div>
          <div class="card shipping-method-choose-card">
            <div class="card-body">
              <div class="shipping-method-choose">
                <div class="notification-area pt-3 pb-2">
                  @foreach(Auth::user()->addresses as $address)
                    <!-- Notification Details-->
                    <div class="list-group-item d-flex py-3">
                      <span class="noti-icon @if($address->is_shipping) active @endif"><i class="lni lni-map"></i></span>
                      <div class="noti-info">
                        <h6>{{ $address->given_name }}</h6>
                        <p>
                          {{ $address->street }}
                          <br> {{ $address->state }}, {{ $address->city }} , {{ $address->postal_code }}
                          <br> {{ $address->country_code }}
                          <br> {{ $address->phone }}
                          <br>
                        </p>
                        <a class="btn-link" href="{{ route('mobile.store.shipping.set', ['id' =>  $address->id , 'store' => $store]) }}">{{ __('ship here') }}</a>
                      </div>
                    </div>
                  @endforeach
                </div>
                <a class="btn btn-danger" href="{{ route('mobile.store.adresses.index', ['store' => \Session::get('store')]) }}">{{ __('+ New Address') }}</a>
              </div>
            </div>
          </div>
        </div>
        <!-- Shipping Method Choose-->
        <div class="shipping-method-choose mb-3">
          <div class="card shipping-method-choose-title-card bg-success">
            <div class="card-body">
              <h6 class="text-center mb-0 text-white">{{ __('Shipping Method') }}</h6>
            </div>
          </div>
          <div class="card shipping-method-choose-card">
            <div class="card-body">
              <div class="shipping-method-choose">
                <ul class="ps-0">
                  <li>
                    <input id="pickup" type="radio" data-price="0" name="shippingMethod" value="pickup" checked>
                    <label for="pickup">{{ __('pickup') }}</label>
                    <div class="check"></div>
                  </li>
                  @foreach($shipping as $method)
                    <li>
                      <input id="fastShipping" type="radio" data-price="{{ $method->cost }}" name="shippingMethod" value="{{ $method->id }}">
                      <label for="fastShipping" class="d-flex justify-content-between align-items-center">
                        {{ $method->name }}
                        <span>{{ $method->delivery_days }} {{ __('delivery days') }}</span>
                        <strong>{{ $method->PresentCost() }}</strong>
                      </label>
                      <div class="check"></div>
                    </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- Coupon Choose-->
        <div class="coupon-choose mb-3">
          <div class="card shipping-method-choose-title-card bg-danger">
            <div class="card-body">
              <h6 class="text-center mb-0 text-white">{{ __('Coupon') }}</h6>
            </div>
          </div>
          <div class="card coupon-choose-card">
            <div class="card-body">
              <div class="coupon-choose">
                <input type="hidden" id="totalPriceV" value="{{ ShoppingCart::totalPrice() }}">
                <input type="hidden" id="shippingPriceV" value="0">
                <input type="hidden" id="couponV" value="0">
                <input type="hidden" id="typeDiscount" value="0">
                <div class="mb-3 d-flex align-items-center justify-content-between">
                  <div>
                    <input class="form-control" type="text" name="coupon" id="coupon" placeholder="{{ __('coupon') }}">
                  </div>
                  <a class="btn btn-danger" href="javascript:;" id="applyCoupon">{{ __('Apply coupon') }}</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Cart Amount Area-->
        <div class="card cart-amount-area">
          <div class="card-body d-flex align-items-center justify-content-between">
            <h5 class="total-price mb-0">
              {{ System::currency() }}<span class="counter TotalPrice">{{ ShoppingCart::totalPrice() }}</span>
            </h5>
            <a class="btn btn-warning" id="show-step-2" href="#">{{ __('Confirm & Pay') }}</a>
          </div>
        </div>
      </div>
      <div class="checkout-wrapper-area py-3 checkout-step-2" style="display: none;">
        <div class="choose-payment-method">
          <a href="#" class="to-step-1">
            <svg class="bi bi-arrow-left" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"></path>
            </svg>
          </a>
          <h6 class="mb-3 text-center">{{ __('Choose Payment Method') }}</h6>
          <div class="row justify-content-center g-3">
            <!-- Single Payment Method-->
            <div class="col-6">
              <div class="single-payment-method" id="credit-card"><a class="credit-card" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-credit-card-2-front mb-2 text-dark" viewBox="0 0 16 16">
                  <path d="M14 3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z"/>
                  <path d="M2 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
                  </svg>
                  <h6>{{ __('Credit Card') }}</h6></a></div>
            </div>
            <!-- Single Payment Method-->
            <div class="col-6">
              <div class="single-payment-method" id="paypal"><a class="paypal" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-wallet2 mb-2 text-dark" viewBox="0 0 16 16">
                  <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"/>
                  </svg>
                  <h6>{{ __('Paypal') }}</h6></a></div>
            </div>
            <!-- Single Payment Method-->
            <div class="col-12">
              <div class="single-payment-method" id="cash"><a class="cash" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-cash mb-2 text-dark" viewBox="0 0 16 16">
                  <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                  <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z"/>
                  </svg>
                  <h6>{{ __('facture') }}</h6></a></div>
            </div>
          </div>
        </div>
      </div>
      <div class="checkout-wrapper-area py-3 credit-card-form" style="display: none;">
        <div class="credit-card-info-wrapper">
          <a href="#" class="to-step-2">
            <svg class="bi bi-arrow-left" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"></path>
            </svg>
          </a>
          <img class="d-block mb-4" src="{{ asset('assets/mobile/img/bg-img/credit-card.png') }}" alt="">
          <div class="pay-credit-card-form payment-form">
              <div class="mb-3">
                <label for="cardNumber">{{ __('Credit Card Number') }}</label>
                <input class="form-control" type="text" id="cardNumber" name="card_no" placeholder="1234 ×××× ×××× ××××" value="">
              </div>
              <div class="mb-3">
                <label for="cardholder">{{ __('Cardholder Name') }}</label>
                <input class="form-control" type="text" id="cardholder" name="username" placeholder="SUHA JANNAT" value="">
              </div>
              <div class="row">
                <div class="col-3">
                  <div class="mb-3">
                    <label for="expiration_month">{{ __('Exp. Month') }}</label>
                    <input class="form-control" type="text" id="expiration_month" name="exp_month" placeholder="12" value="">
                  </div>
                </div>
                <div class="col-3">
                  <div class="mb-3">
                    <label for="expiration_year">{{ __('Exp. Year') }}</label>
                    <input class="form-control" type="text" id="expiration_year" name="exp_year" placeholder="2020" value="">
                  </div>
                </div>
                <div class="col-6">
                  <div class="mb-3">
                    <label for="cvvcode">{{ __('CVV Code') }}</label>
                    <input class="form-control" type="text" id="cvvcode" name="cvv" placeholder="××××" value="">
                  </div>
                </div>
              </div>
              <button class="btn btn-warning btn-lg w-100" type="submit">{{ __('Pay Now') }}</button>
          </div>
        </div>
      </div>
      <div class="checkout-wrapper-area py-3 paypal-form" style="display: none;">
        <div class="credit-card-info-wrapper">
          <a href="#" class="to-step-2">
            <svg class="bi bi-arrow-left" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"></path>
            </svg>
          </a>
          <img class="d-block mb-4" src="{{ asset('assets/mobile/img/bg-img/credit-card.png') }}" alt="">
          <div class="pay-credit-card-form payment-form">
              <div class="mb-3">
                <label for="paypalEmail">{{ __('Email Address') }}</label>
                <input class="form-control" type="email" name="paypal-email" id="paypalEmail" placeholder="paypal@example.com" value="">
              </div>
              <div class="mb-3">
                <label for="paypalPassword">{{ __('Password') }}</label>
                <input class="form-control" type="password" name="paypal-password" placeholder="{{ __('password') }}" id="paypalPassword" value="">
              </div>
              <button class="btn btn-warning btn-lg w-100" type="submit">{{ __('Pay Now') }}</button>
          </div>
        </div>
      </div>
      <div class="checkout-wrapper-area py-3 cash-form" style="display: none;">
        <div class="credit-card-info-wrapper">
          <a href="#" class="to-step-2">
            <svg class="bi bi-arrow-left" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"></path>
            </svg>
          </a>
          <img class="d-block mb-4" src="{{ asset('assets/mobile/img/bg-img/credit-card.png') }}" alt="">
          <div class="cod-info text-center mb-3 payment-form">
            <p>{{ __('Pay when you receive your products.') }}</p>
          </div>
          <button class="btn btn-warning btn-lg w-100" type="submit">{{ __('Pay Now') }}</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection