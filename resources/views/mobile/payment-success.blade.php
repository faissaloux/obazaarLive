<!DOCTYPE html>
<html lang="en">
  
  @include('mobile/inc/head')
  <body>
    @include('mobile/inc/preloader')
    <!-- Order/Payment Success-->
    <div class="order-success-wrapper">
      <div class="content"><i class="lni lni-checkmark-circle"></i>
        <h5>Payment Done</h5>
        <p>We will notify you of all the details via email. Thank you!</p><a class="btn btn-warning mt-3" href="{{ route('mobile.stores') }}">Buy Again</a>
      </div>
    </div>
    @include('mobile/inc/scripts')
  </body>

</html>