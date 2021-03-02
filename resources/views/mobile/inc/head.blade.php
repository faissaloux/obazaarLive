<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover, shrink-to-fit=no">
    <meta name="description" content="Suha - Multipurpose Ecommerce Mobile HTML Template">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#100DD1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Title-->    
    <title>@yield('title')</title>
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap">
    <!-- Favicon-->
    @php $favicon = option('favicon'); @endphp @if(!empty($favicon))
      <link rel="icon" type="image/x-icon" href="/uploads/{{ $favicon }}">
      @endif
    <!-- CSS Libraries-->
    <link rel="stylesheet" href="{{ asset('assets/mobile/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/mobile/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/mobile/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/mobile/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/mobile/css/default/lineicons.min.css') }}">
    <!-- Stylesheet-->
    <link rel="stylesheet" href="{{ asset('assets/mobile/css/custom.css') }}?v={{ env('ASSETS_VERSION') }}">
    @if(System::isRtl())
        <link rel="stylesheet" href="{{ asset('assets/mobile/css/style_rtl.css') }}?v={{ env('ASSETS_VERSION') }}">
      @else
        <link rel="stylesheet" href="{{ asset('assets/mobile/css/style.css') }}?v={{ env('ASSETS_VERSION') }}">
      @endif
    <!-- Web App Manifest-->
    <link rel="manifest" href="manifest.json">
</head>