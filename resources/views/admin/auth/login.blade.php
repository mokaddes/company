@php
    $settings = getSetting();
@endphp

<!DOCTYPE html>
<html lang="{{ app()->getLocale() ?? 'en' }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $settings->site_name }}</title>
    @include('admin.includes.style')
</head>
<style>
    .signin_form {
        background: linear-gradient(210deg, #ededed, #87a4aa) !important;
        position: absolute;
        top: 50%;
        left: 50%;
        border-radius: 12px;
        transform: translate(-50%, -50%);
        width: 90%;
        max-width: 450px;
    }

    .btn-primary {
        height: 49px;
        border-radius: 10px;
        font-size: 16px;
        font-weight: bold;
        text-transform: uppercase;
    }

    .form-label {
        font-size: 14px;
        font-family: 'Roboto', sans-serif;
        font-weight: 500;
    }

    .form-control {
        height: 50px;
        border: 1px solid #888;
        font-size: 14px;
        border-radius: 12px;
        font-family: 'Raleway', sans-serif;
        font-weight: 500;
        outline: none !important;
        box-shadow: none !important;
    }

    .form-control::placeholder {
        color: #BBB;
    }

    .input-group>:not(:first-child):not(.dropdown-menu):not(.valid-tooltip):not(.valid-feedback):not(.invalid-tooltip):not(.invalid-feedback) {
        border: 1px solid #888;
    }
    .border-12 {
        border-radius: 12px;
    }
    body {
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
</style>

<body style="background:#353f8a">
    <!--  SignIn  -->
    <div class="">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-lg-5 col-xl-5">
                    <form class="signin_sec shadow-sm" method="POST" action="{{ route('admin.login') }}">
                        @csrf
                        <div class="signin_form p-3  p-md-5 bg-white">
                            <div class="mb-5 text-center">
                                <a href="{{ route('frontend.home') }}">
                                    <img src="{{ getLogo($settings->site_logo) }}" width="150" alt="logo">
                                </a>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('auth.login.admin_email') }}</label>
                                <input type="email" name="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}"
                                    placeholder="{{ __('auth.placeholder.enter_your_email') }}" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label">{{ __('auth.login.admin_password') }}</label>
                                <div class="input-group input-group-flat">
                                    <input type="password" name="password" id="password" value=""
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="{{ __('auth.placeholder.enter_your_password') }}" required>
                                    <span class="input-group-text px-3 border-12">
                                        <a href="javascript:void(0)"
                                            class="link-secondary fa fa-fw fa-eye field-icon toggle-password"
                                            toggle="#password">
                                        </a>
                                    </span>
                                </div>


                                {{-- <input type="password" name="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="{{__('auth.placeholder.enter_your_password')}}" required> --}}
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary w-100">{{ __('Sign In') }}</button>
                            <div class="text-center"> <a href="{{ route('frontend.home') }}" class="m-2 p-2" style="display: block">{{ __('messages.nav.home') }}</a></div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- js file -->
    @include('frontend.layouts.script')
</body>

</html>
