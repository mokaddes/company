
@extends('frontend.layouts.app')

@section('title')
{{ $data['title'] ?? __('auth.sign_up') }}
@endsection

@php
    $setting = getSetting();
@endphp

@section('meta')
    <meta property="og:title" content="Sign Up | Venmeo.de" />
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
        <li class="breadcrumb-item">{{__('auth.sign_up')}}</li>
    @endsection
    <!-- ======================= breadcrumb end  ============================ -->

    <!-- ======================= Signup start  ============================ -->
    <div class="registration-section pt-5 pb-5" style="min-height: 82vh;">
        <div class="container">
            <div class="card login_form p-2 p-lg-4 shadow-sm">
                <div class="card-body">
                    <h2 class="h2 text-center mb-4">{{__('auth.registration.create_account')}}</h2>
                    <form method="POST" action="{{ route('register') }}" autocomplete="off">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">{{__('auth.registration.full_name')}} <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" placeholder="john"
                                autocomplete="off" required value="{{ old('name') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">{{__('auth.registration.email_address')}} <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control" placeholder="john@gmail.com"
                                autocomplete="off" required value="{{ old('email') }}">
                        </div>
                        <div class="mb-2">
                            <label class="form-label d-block w-100">
                                {{__('auth.registration.password')}} <span class="text-danger">*</span>
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
                        <div class="mb-2">
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
                            <button type="submit" class="btn btn-primary w-100">{{__('auth.sign_up')}}</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class=" text-center mt-4 send_back">
                <p class="m-0">{{__('auth.registration.have_account')}}? <a href="{{route('login')}}">{{__('auth.sign_in')}}</a></p>
            </div>
        </div>
    </div>
    <!-- ======================= Signup end  ============================ -->
@endsection

@push('script')
@endpush

