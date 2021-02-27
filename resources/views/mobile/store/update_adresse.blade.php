@extends(\System::$ACTIVE_MOBILE_THEME_PATH.'/layouts/store_layout') 
@section('title')
{{ __('Add new adress') }}
@endsection

<style>
    .mt-100 {
      margin-top: 100px;
  }
</style>

@section('header-content')
<div class="back-button">
  <a href="{{ url()->previous() }}">
    <i class="lni {{ System::isRtl() ? 'lni-arrow-right':'lni-arrow-left'}}"></i>
  </a>
</div>
<div class="page-heading">
  <h6 class="mb-0">{{ __('Add new adress') }}</h6>
</div>
@endsection

@section('content')
<div class="page-content-wrapper">

  <div class="container">
    <div class="section-heading mt-3">
      <h5 class="mb-1 mt-100">{{ __('shipping') }}</h5>
      <p class="mb-4">{{ __('Add new adress') }}</p>
    </div>
    <!-- Contact Form-->
    <div class="contact-form mt-3 pb-3">
      <form action="{{ route('mobile.store.adresses.add', ['store' => \Session::get('store')]) }}" method='post'>
        @csrf
        
        <input class="form-control mb-3" name="given_name" type="text" value="{{ $address->given_name }}" placeholder="{{ __('Full Name ') }}">
        <input class="form-control mb-3" name="street" type="text" value="{{ $address->street }}" placeholder="{{ __('Street Address') }}">
        <input class="form-control mb-3" name="housenumber" type="text" value="{{ $address->housenumber }}" placeholder="{{ __('house number') }}">
        <input class="form-control mb-3" name="city" type="text" value="{{ $address->city }}" placeholder="{{ __('City') }}">
        <input class="form-control mb-3" name="country_code" type="text" value="{{ $address->country_code }}" placeholder="{{ __('Country') }}">
        <input class="form-control mb-3" name="state" type="text" value="{{ $address->state }}" placeholder="{{ __('State/Province') }}">
        <input class="form-control mb-3" name="postal_code" type="text" value="{{ $address->postal_code }}" placeholder="{{ __('Zip/Postal Code ') }}">
        <input class="form-control mb-3" name="phone" type="tel" value="{{ $address->phone }}" placeholder="{{ __('Phone Number') }}">

        <button class="btn btn-success btn-lg w-100">{{ __('Save Changes') }}</button>
      </form>
    </div>
  </div>
</div>
@endsection