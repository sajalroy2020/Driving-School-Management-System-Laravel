<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.header')
<body>
<!-- Main Content -->
<div class="zMain-wrap">
    <!-- Sidebar -->
@include('layouts.sidebar')
<!-- Main Content -->
    <div class="zMainContent">
        <!-- Header -->
    @include('layouts.navbar')
    <!-- Content -->
        @yield('content')
    </div>
</div>

@if (!empty(getSetting('cookie_status')) && getSetting('cookie_status') == STATUS_ACTIVE)
    <div class="cookie-consent-wrap shadow-lg">
        @include('cookie-consent::index')
    </div>
@endif
@include('layouts.route')
@include('layouts.script')
</body>
</html>
