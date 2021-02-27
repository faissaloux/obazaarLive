@extends(\System::$ACTIVE_MOBILE_THEME_PATH.'/layouts/store_layout') 
@section('title')
  {{ __('Choose Language') }}
@endsection

@section('header-content')
  <div class="back-button">
    <a href="{{ url()->previous() }}">
      <i class="lni {{ System::isRtl() ? 'lni-arrow-right':'lni-arrow-left'}}"></i>
    </a>
  </div>
  <div class="page-heading">
    <h6 class="mb-0">{{ __('Choose Language') }}</h6>
  </div>
@endsection

@section('content')
<div class="page-content-wrapper">
  <div class="container">
    <!-- Language Area-->
    <div class="language-area-wrapper py-3">
      <ul>
        @foreach(\System::$LANGS as $lang)
          <li class="lang" data-link="?lang={{ $lang }}">
            <input id="{{ \System::$LANGS_IDS[$lang] }}" type="radio" name="lang" {{ \App::getLocale() == $lang ? 'checked':''  }}>
            <label for="{{ \System::$LANGS_IDS[$lang] }}">{{ \System::$LANGS_NAME[$lang] }}</label>
            <div class="check"></div>
          </li>
        @endforeach
        <li>
      </ul>
    </div>
  </div>
</div>
@endsection