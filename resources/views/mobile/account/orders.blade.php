@extends(\System::$ACTIVE_MOBILE_THEME_PATH.'/layouts/store_layout') 
@section('title')
{{ __('Orders') }}
@endsection

@section('header-content')
<div class="back-button">
    <a href="{{ url()->previous() }}">
      <i class="lni {{ System::isRtl() ? 'lni-arrow-right':'lni-arrow-left'}}"></i>
    </a>
  </div>
  <div class="page-heading">
    <h6 class="mb-0">{{ __('Orders') }}</h6>
  </div>
@endsection

@section('content')
<div class="page-content-wrapper">
    <!-- Top Products-->
    <div class="top-products-area py-3">
      <div class="container">
        <div class="section-heading d-flex align-items-center justify-content-between">
          <h6>{{ __('Orders') }}</h6>
          <!-- Layout Options-->
        </div>
            @if(Auth::user()->orders->count() != 0)
                    @foreach(Auth::user()->orders as $order )
                    <div class="accordian-area-wrapper mt-3">
                        <!-- Accordian Card-->
                            <div class="card accordian-card seller-card clearfix">
                                <div class="card-body">
                                <div class="row">
                                    <div class="col-5">{{ __('Order N°') }} : </div>
                                    <div class="col-7"><a href="{{ route('mobile.account.orders.orders_detail',['id' => $order->id ]) }}">{{ $order->id }}</a></div>
                                </div>
                                <div class="row">
                                    <div class="col-5">{{ __('Date') }} : </div>
                                    <div class="col-7">{{ $order->created_at->diffForHumans() }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-5">{{ __('statue') }} : </div>
                                    <div class="col-7">{{ $order->statue() }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-5">{{ __('Total') }} : </div>
                                    <div class="col-7">{{ $order->total }} {{ System::currency() }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-5">{{ __('order details') }} : </div>
                                    <div class="col-7"><a href="{{ route('mobile.account.orders.orders_detail',['id' => $order->id ]) }}">{{ __('order details') }}</a></div>
                                </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
            @else
            <div class="ps-table--invoices">
                    <div class="row text-center">
                        <div class="empty-order">
                            <i class="icon-cart"></i>
                            <p>{{ __('You have no orders') }}</p>
                            <a class="ps-btn" href="/">{{ __('Order now') }}</a>
                        </div>
                    </div>
                </div>
            @endif
      </div>
    </div>
  </div>
@endsection