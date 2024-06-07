<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@push('title')
    {{__("Login")}}
@endpush
@include('layouts.header')
<body>
<div class="signLog-section">
    <div class="left" data-aos="fade-right" data-aos-duration="1000">
        <div class="wrap">
            <div class="zMain-signLog-content">
                <a href="{{route('frontend')}}" class="d-flex mb-30">
                    <img src="{{getFileLink('app_logo')}}" alt=""/>
                </a>
                <div class="pb-30">
                    <h4 class="fs-32 fw-600 lh-48 text-main-color pb-5">{{__("Sign In")}}</h4>
                    <p class="fs-14 fw-400 lh-22 text-para-text">{{__("Don't have an account")}}? <a
                            href="{{route('register')}}" class="fw-500 text-primary-color text-decoration-underline">{{__("Sign Up")}}</a></p>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="pb-20">
                        <label for="loginEmail" class="sf-form-label">{{__("Email")}}</label>
                        <input type="email" class="form-control sf-form-control @error('email') is-invalid @enderror"
                               id="loginEmail" placeholder="{{__("Enter your Email")}}" name="email"
                               value="{{ old('email') }}"/>
                        @error('email')
                        <span class="fs-12 text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="pb-30 passShowHide">
                        <label for="loginPass" class="sf-form-label">{{__("Password")}}</label>
                        <input type="password"
                               class="form-control sf-form-control passShowHideInput @error('password') is-invalid @enderror"
                               id="loginPass" name="password" placeholder="{{__("Enter your password")}}"/>
                        <button type="button" toggle=".passShowHideInput"
                                class="toggle-password fa-solid fa-eye"></button>
                        @error('password')
                        <span class="fs-12 text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="pb-30 d-flex justify-content-between align-items-center flex-wrap g-10">
                        <div class="sf-form-checkbox">
                            <input type="checkbox" class="form-check-input" id="authRemember"
                                   name="remember" {{ old('remember') ? 'checked' : '' }} />
                            <label for="authRemember">{{__("Remember Me")}}</label>
                        </div>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                               class="fs-14 fw-400 lh-22 text-primary-color">{{__("Forgot Password?")}}</a>
                        @endif
                    </div>
                    <button type="submit"
                        class="border-0 d-flex justify-content-center align-items-center w-100 p-15 bd-ra-10 bg-primary-color fs-14 fw-500 lh-20 text-white">
                        {{__("Sign In")}}
                    </button>
                </form>
                @if(env('APP_DEMO_CREDENTIAL', false))
                <div class="d-flex mt-30 mb-30">
                    <button type="button" data-for="admin"
                            class="click-for-demo-login border-0  justify-content-center align-items-center w-100 p-15 bd-ra-10 bg-para-text fs-14 fw-500 lh-20 text-white">
                        {{__("Admin")}}
                    </button>
                    <button type="button" data-for="staff"
                            class="click-for-demo-login border-0 ml-11  justify-content-center align-items-center w-100 p-15 bd-ra-10 bg-para-text fs-14 fw-500 lh-20 text-white">
                        {{__("Staff")}}
                    </button>
                    <button type="button" data-for="instructor"
                            class="click-for-demo-login border-0 ml-11  justify-content-center align-items-center w-100 p-15 bd-ra-10 bg-para-text fs-14 fw-500 lh-20 text-white">
                        {{__("Instructor")}}
                    </button>
                    <button type="button" data-for="student"
                            class="click-for-demo-login border-0 ml-11  justify-content-center align-items-center w-100 p-15 bd-ra-10 bg-para-text fs-14 fw-500 lh-20 text-white">
                        {{__("Student")}}
                    </button>
                </div>
                @endif
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
<script>
    $(document).on("click", ".click-for-demo-login", function () {
        var user = $(this).data('for');
        $("#loginEmail").val(user+'@gmail.com');
        $("#loginPass").val(123456);
    });
</script>
</body>
</html>
