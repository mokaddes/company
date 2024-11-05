@extends('frontend.layouts.app')

@section('title')
{{ $data['title'] ?? __('auth.sign_in') }}
@endsection

@php
    $setting = getSetting();
@endphp

@section('meta')
    <meta property="og:title" content="Sign In | Venmeo.de" />
    <meta property="og:description" content="{{$setting->seo_meta_description}}" />
    <meta property="og:image" content="{{ asset($setting->site_logo) }}" />
    <meta name="description" content="{{$setting->seo_meta_description}}">
    <meta name="keywords" content="{{$setting->seo_keywords}}">
@endsection

@push('style')
@endpush

@section('content')
    <!-- ======================= breadcrumb start  ============================ -->
    @section('breadcrumb')
        <li class="breadcrumb-item">{{__('auth.sign_in')}}</li>
    @endsection
    <!-- ======================= breadcrumb end  ============================ -->

    <!-- ======================= login start  ============================ -->
    <div class="login-section pt-5 pb-5" style="min-height: 82vh;">
        <div class="container mt-5">
            <div class="card login_form p-2 p-lg-4">
                <div class="card-body">
                    <h2 class="h2 text-center mb-5">{{__('auth.login.login_your_account')}}</h2>
                    <form method="POST" action="{{ route('login') }}" autocomplete="off">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">{{__('auth.registration.email_address')}} <span class="text-danger">*</span></label>
                            <input type="email" name="email" autofocus class="form-control" placeholder="john@gmail.com" autocomplete="off" required value="{{ old('name') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label d-block w-100">
                                {{__('auth.registration.password')}} <span class="text-danger">*</span>
                            </label>
                            <div class="input-group input-group-flat">
                                <input type="password" name="password" id="password-field" class="form-control"
                                    placeholder="{{__('auth.registration.your_password')}}" autocomplete="off" required>
                                <span class="input-group-text p-0">
                                    <a href="javascript:void(0)" class="link-secondary fa fa-fw fa-eye field-icon toggle-password"
                                        toggle="#password-field">
                                    </a>
                                </span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-check">  
                                <input type="checkbox" class="form-check-input" name="remember">
                                <span class="form-check-label">{{__('auth.login.remember_me')}}</span>
                            </label>
                        </div>
                        <div class="form-footer mt-4 text-center">
                            <button type="submit" class="btn btn-primary w-100">{{__('auth.sign_in')}}</button>
                            <span class="form-label-description mt-3 d-block">
                                <a href="{{ route('password.request') }}">{{__('auth.login.forget_password')}}?</a>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="text-center mt-4 send_back">
                <p class="m-0">{{__('auth.login.dont_have_account')}}? <a href="{{ route('register') }}">{{__('auth.sign_up')}}</a></p>
            </div>
        </div>
    </div>
    <!-- ======================= login end  ============================ -->
@endsection

@push('script')
@endpush