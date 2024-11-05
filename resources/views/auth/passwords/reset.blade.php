@extends('frontend.layouts.app')

@section('title')
{{ $data['title'] ?? __('auth.forgot_password.reset_password') }}
@endsection

@php
    $setting = getSetting();
@endphp

@section('meta')
    <meta property="og:title" content="Reset Password | Venmeo.de" />
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
        <li class="breadcrumb-item">{{__('auth.forgot_password.reset_password')}}</li>
    @endsection
    <!-- ======================= breadcrumb end  ============================ -->

    <!-- ======================= Reset password start  ============================ -->
    <div class="login-section pt-8 pb-8" style="min-height: 82vh;">
        <div class="container">
            <div class="card login_form p-2 p-lg-4 shadow-sm">
                <div class="card-body">
                    <h2 class="h2 text-center mb-4">{{__('auth.forgot_password.reset_password')}}</h2>
                    {{-- <p class="mb-4">Enter your email address and your password will be reset and emailed to you.</p> --}}
                    <form method="POST" action="{{ route('password.update') }}" autocomplete="off">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="mb-3">
                            <label class="form-label">{{__('auth.registration.email_address')}} <span class="text-danger">*</span></label>
                            <input type="email" name="email" autofocus class="form-control" placeholder="{{__('auth.registration.your_mail')}}"
                                autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label d-block w-100">
                               {{__('auth.registration.new_password')}} <span class="text-danger">*</span>
                            </label>
                            <div class="input-group input-group-flat">
                                <input type="password" name="password" id="password-field" class="form-control"
                                    placeholder="{{__('auth.registration.your_password')}}" autocomplete="off" required>
                                <span class="input-group-text p-0">
                                    <a href="javascript:void(0)"
                                        class="link-secondary fa fa-fw fa-eye field-icon toggle-password"
                                        toggle="#password-field">
                                    </a>
                                </span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label d-block w-100">
                                {{__('auth.registration.confirm_password')}} <span class="text-danger">*</span>
                            </label>
                            <div class="input-group input-group-flat">
                                <input type="password" name="password_confirmation" id="confirm_password"
                                    class="form-control" placeholder="{{__('auth.registration.confirm_your_password')}}" autocomplete="off"
                                    required>
                                <span class="input-group-text p-0">
                                    <a href="javascript:void(0)"
                                        class="link-secondary fa fa-fw fa-eye field-icon confirm-toggle-password"
                                        toggle="#confirm_password">
                                    </a>
                                </span>
                            </div>
                        </div>
                        <div class="form-footer mt-4">
                            <button type="submit" class="btn btn-primary w-100">{{__('messages.common.submit')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ======================= Reset password end  ============================ -->
@endsection

@push('script')
@endpush
