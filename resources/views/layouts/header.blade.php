<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>{{ getSetting('app_name') }} - @stack('title' ?? '')</title>

@hasSection('meta')
    @stack('meta')
@else


    <!-- Open Graph meta tags for social sharing -->
        <meta property="og:type" content="{{ __('zaisub') }}">
        <meta property="og:title" content="{{ $metaData['meta_title'] ?? getSetting('app_name') }}">
        <meta property="og:description" content="{{ $metaData['meta_description'] ?? getSetting('app_name') }}">
        <meta property="og:image" content="{{ $metaData['og_image'] ?? getFileLink(getSetting('app_logo')) }}">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:site_name" content="{{getSetting('app_name') }}">

        <!-- Twitter Card meta tags for Twitter sharing -->
        <meta name="twitter:card" content="{{ __('zaisub') }}">
        <meta name="twitter:title" content="{{ $metaData['meta_title'] ?? getSetting('app_name') }}">
        <meta name="twitter:description" content="{{ $metaData['meta_description'] ?? getSetting('app_name') }}">
        <meta name="twitter:image" content="{{ $metaData['og_image'] ?? getFileLink(getSetting('app_logo')) }}">

        <meta name="csrf-token" content="{{ csrf_token() }}"/>
@endif
<!-- css file  -->
    @include('layouts.style')
</head>
