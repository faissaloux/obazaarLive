@extends(\System::$ACTIVE_MOBILE_THEME_PATH.'/layouts/store_layout') 
@section('title')
  {{ __('Adresses') }}
@endsection

<style>
    .mt-100 {
      margin-top: 100px;
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
  <h6 class="mb-0">{{ __('Adresses') }}</h6>
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
      <form action="{{ route('mobile.account.adresses.add') }}" method='post'>
        @csrf
        <input class="form-control mb-3" name="given_name" type="text" placeholder="{{ __('Full Name ') }}">
        <input class="form-control mb-3" name="street" type="text" placeholder="{{ __('Street Address') }}">
        <input class="form-control mb-3" name="housenumber" type="text" placeholder="{{ __('house number') }}">
        <input class="form-control mb-3" name="city" type="text" placeholder="{{ __('City') }}">
        <input class="form-control mb-3" name="country_code" type="text" placeholder="{{ __('Country') }}">
        <input class="form-control mb-3" name="state" type="text" placeholder="{{ __('State/Province') }}">
        <input class="form-control mb-3" name="postal_code" type="text" placeholder="{{ __('Zip/Postal Code ') }}">
        <input class="form-control mb-3" name="phone" type="tel" placeholder="{{ __('Phone Number') }}">

        <button class="btn btn-success btn-lg w-100">{{ __('Save Changes') }}</button>
      </form>
    </div>
  </div>
</div>
@endsection