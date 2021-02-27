<style>
  i.lni-checkmark-circle {
      width: 24px;
      height: 24px;
      display: inline-block;
      background-color: #00b894;
      text-align: center;
      color: #ffffff;
      line-height: 24px;
      border-radius: .25rem;
      margin-right: .4rem;
      font-size: 14px;
  }
  i.lni-cross-circle{
    width: 24px;
      height: 24px;
      display: inline-block;
      background-color: rgb(245, 61, 61);
      text-align: center;
      color: #ffffff;
      line-height: 24px;
      border-radius: .25rem;
      margin-right: .4rem;
      font-size: 14px;
  }
</style>

@if (session()->has('success'))
<div class="toast pwa-install-alert shadow bg-white" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000" data-bs-autohide="true">
  <div class="toast-body">
    <div class="content d-flex align-items-center mb-2">
      <i class="lni lni-checkmark-circle"></i>
      <h6 class="mb-0">{{ __('Success') }}</h6>
      <button class="btn-close ms-auto" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
    </div><span class="mb-0 d-block">{{ session('success') }}</span>
  </div>
</div>
@endif

@if (session()->has('error'))
<div class="toast pwa-install-alert shadow bg-white" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000" data-bs-autohide="true">
  <div class="toast-body">
    <div class="content d-flex align-items-center mb-2">
      <i class="lni lni-cross-circle"></i>
      <h6 class="mb-0">{{ __('Error') }}</h6>
      <button class="btn-close ms-auto" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
    </div><span class="mb-0 d-block">{{ session('error') }}</span>
  </div>
</div>
@endif

@if ($errors->any())
<div class="alert alert-error d-flex justify-content-center">
     @foreach ($errors->all() as $error)
        {{$error}} &nbsp;
     @endforeach
         </div>
 @endif