@extends(\System::$ACTIVE_MOBILE_THEME_PATH.'/layouts/layout') 
@section('title')
    {{ __('Settings') }}
@endsection

@section('content')
<div class="page-content-wrapper">
  <div class="container">
    <!-- Settings Wrapper-->
    <div class="settings-wrapper py-3">
      <!-- Single Setting Card-->
      <div class="card settings-card">
        <div class="card-body">
          <!-- Single Settings-->
          <div class="single-settings d-flex align-items-center justify-content-between">
            <div class="title"><i class="lni lni-night"></i><span>{{ __('Night Mode') }}</span></div>
            <div class="data-content">
              <div class="toggle-button-cover">
                <div class="button r">
                  <input class="checkbox" id="darkSwitch" type="checkbox">
                  <div class="knobs"></div>
                  <div class="layer"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Single Setting Card-->
      <div class="card settings-card">
        <div class="card-body">
          <!-- Single Settings-->
          <div class="single-settings d-flex align-items-center justify-content-between">
            <div class="title"><i class="lni lni-world"></i><span>{{ __('Language') }}</span></div>
            <div class="data-content"><a href="{{ route('mobile.languages') }}">{{ \System::$LANGS_NAME[\App::getLocale()] }}<i class="lni lni-chevron-right"></i></a></div>
          </div>
        </div>
      </div>
      <!-- Single Setting Card-->
      <div class="card settings-card">
        <div class="card-body">
          <!-- Single Settings-->
          <div class="single-settings d-flex align-items-center justify-content-between">
            <div class="title"><i class="lni lni-protection"></i><span>{{ __('Conditions') }}</span></div>
            <div class="data-content"><a href="{{ route('mobile.agb') }}">{{ __('View') }}<i class="lni lni-chevron-right"></i></a></div>
          </div>
        </div>
      </div>
      <!-- Single Setting Card-->
      <div class="card settings-card">
        <div class="card-body">
          <!-- Single Settings-->
          <div class="single-settings d-flex align-items-center justify-content-between">
            <div class="title"><i class="lni lni-protection"></i><span>{{ __('Data protection') }}</span></div>
            <div class="data-content"><a href="{{ route('mobile.datenschutzerklarung') }}">{{ __('View') }}<i class="lni lni-chevron-right"></i></a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection