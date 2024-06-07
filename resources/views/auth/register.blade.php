<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@push('title')
    {{__("Sign Up")}}
@endpush
@include('layouts.header')
<body>
<div class="signLog-section">
    <div class="left" data-aos="fade-right" data-aos-duration="1000">
        <div class="wrap">
            <div class="zMain-signLog-content">
                <!-- Logo -->
                <a href="{{route('frontend')}}" class="d-flex mb-30">
                    <img src="{{getFileLink('app_logo')}}" alt=""/>
                </a>
                <!--  -->
                <div class="pb-30">
                    <h4 class="fs-32 fw-600 lh-48 text-main-color pb-5">{{__("Sign Up")}}</h4>
                    <p class="fs-14 fw-400 lh-22 text-para-text">{{__("Already have an account?")}} <a href="{{ route('login') }}" class="fw-500 text-primary-color text-decoration-underline">{{__("Sign In")}}</a></p>
                </div>
                <!--  -->
                <form enctype="multipart/form-data" method="post"  action="{{ route('register') }}">
                    @csrf
                    <div class="pb-20">
                        <label for="inputFullName" class="sf-form-label">{{__("Full Name")}}</label>
                        <input type="text" class="form-control sf-form-control @error('name') is-invalid @enderror" id="inputFullName" name="name" placeholder="{{ __('Enter full name') }}" value="{{ old('name') }}" />
                        @error('name')
                        <span class="fs-12 text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="pb-20">
                        <label for="inputEmailAddress" class="sf-form-label">{{__("Email Address")}}</label>
                        <input type="email" class="form-control sf-form-control @error('email') is-invalid @enderror" id="inputEmailAddress" value="{{ old('email') }}" name="email" placeholder="{{__("Enter email address")}}" />
                        @error('email')
                        <span class="fs-12 text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="pb-30 passShowHide">
                        <label for="inputPassword" class="sf-form-label">{{__("Password")}}</label>
                        <input type="password" class="form-control sf-form-control passShowHideInput @error('password') is-invalid @enderror" id="inputPassword" placeholder="{{__("Enter your password")}}"  name="password"/>
                        <button type="button" toggle=".passShowHideInput" class="toggle-password fa-solid fa-eye"></button>
                        @error('password')
                        <span class="fs-12 text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!--  -->
                    <button type="submit" class="border-0 d-flex justify-content-center align-items-center w-100 p-15 bd-ra-10 bg-primary-color fs-14 fw-500 lh-20 text-white">{{__("Sign Up")}}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@include('layouts.script')
</body>
</html>
