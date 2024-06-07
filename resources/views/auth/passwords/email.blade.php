<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@push('title')
    {{__("Forgot Password")}}
@endpush
@include('layouts.header')
<body>
<div class="signLog-section">
    <div class="left" data-aos="fade-right" data-aos-duration="1000">
        <div class="wrap">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="zMain-signLog-content">
                <a href="{{route('frontend')}}" class="d-flex mb-30">
                    <img src="{{getFileLink('app_logo')}}" alt=""/>
                </a>
                <div class="pb-30">
                    <h4 class="fs-32 fw-600 lh-48 text-main-color pb-5">{{__("Forgot Password?")}}</h4>
                </div>

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="pb-20">
                        <label for="inputPhoneNumberOrEmail" class="sf-form-label">{{__("Email")}}</label>
                        <input type="email" class="form-control sf-form-control @error('email') is-invalid @enderror"
                               id="inputPhoneNumberOrEmail" placeholder="{{__("Enter your Email")}}" name="email"
                               value="{{ old('email') }}"/>
                        @error('email')
                        <span class="fs-12 text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit"
                            class="border-0 d-flex justify-content-center align-items-center w-100 p-15 bd-ra-10 bg-primary-color fs-14 fw-500 lh-20 text-white">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@if (!empty(getSetting('cookie_status')) && getSetting('cookie_status') == STATUS_ACTIVE)
    <div class="cookie-consent-wrap shadow-lg">
        @include('cookie-consent::index')
    </div>
@endif
@include('layouts.script')
</body>
</html>
