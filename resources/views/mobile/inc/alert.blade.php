<div class="toast pwa-install-alert shadow bg-white" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000" data-bs-autohide="true">
    <div class="toast-body">
      <div class="content d-flex align-items-center mb-2"><img src="img/icons/icon-72x72.png" alt="">
        <h6 class="mb-0">Add to Home Screen</h6>
        <button class="btn-close ms-auto" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
      </div><span class="mb-0 d-block">Add Suha on your mobile home screen. Click the<strong class="mx-1">"Add to Home Screen"</strong>button &amp; enjoy it like a regular app.</span>
    </div>
  </div>

  @if (session()->has('success'))
        <div class="alert alert-success d-flex justify-content-center"> {{ session('success') }}    </div>
@endif

@if (session()->has('error'))
        <div class="alert alert-error d-flex justify-content-center"> {{ session('error') }}    </div>
@endif

@if ($errors->any())
<div class="alert alert-error d-flex justify-content-center">
     @foreach ($errors->all() as $error)
        {{$error}} &nbsp;
     @endforeach
         </div>
 @endif