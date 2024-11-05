@extends('frontend.layouts.app')

@section('title')
    {{ $title ?? $setting->site_title }}
@endsection

@section('meta')
    <meta property="og:title" content="{{ $seo->title ?? $og_title }}" />
    <meta property="og:description" content="{{ $seo->description ?? $og_description }}" />
    <meta property="og:image" content="{{ asset($seo->image ?? $og_image) }}" />
    <meta name="description" content="{{ $seo->meta_description ?? $og_description }}">
    <meta name="keywords" content="{{ $seo->keywords ?? $meta_keywords }}">
@endsection

@push('style')
    <style>
        .card-footer {
            background-color: #ffffff;
            border-top: none;
        }
        .pointer {
            height: 10px;
            width: 10px;
            transform: rotate(45deg);
            border-radius: 20px 0px 2px 5px;
            margin-top: -14px;
            position: relative;
            left: 5px;
            right: 0px;
        }
        /* @media (max-width: 768px) {
            .fa-ul {
                margin-left: 0 !important;
            }
        } */
    </style>
@endpush
@php
    $localLanguage = session()->get('languageName') ?? geDefaultLanguage()->iso_code;
@endphp
@section('content')
    <!-- ======================= banner start  ============================ -->
    <div class="banner-section pt-8 pb-8 mb-5 position-relative">
        <div class="custom-shape-divider-bottom-1716635912">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path
                    d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z"
                    class="shape-fill">
                </path>
            </svg>
        </div>
        <div class="container">
            <div class="row d-flex align-items-center text-center text-lg-start">
                <div class="col-lg-7 mb-4 mb-lg-0">
                    <div class="banner-content">
                        {{-- <h1 class="title mb-4">{{ __('messages.home.modernize_your_connections') }}</h1> --}}
                        <h1 class="title mb-4">
                            @if ($localLanguage == 'en')
                                {{ $homeContent->col1_en }}
                            @else
                                {{ $homeContent->col1_gr }}
                            @endif
                        </h1>
                        <h4 class="subtitle mb-5">
                            @if ($localLanguage == 'en')
                                {{ $homeContent->col2_en }}
                            @else
                                {{ $homeContent->col2_gr }}
                            @endif
                        </h4>
                        {{-- <h4 class="subtitle mb-5">{{ __('messages.home.quick_convenient_customizable') }}</h4> --}}
                        <a href="{{ auth()->check() ? route('user.card.theme') : route('login') }}"
                            class="btn btn-primary">{{ __('messages.common.create_your_card') }}</a>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="banner-img">
                        <img src="{{ getBanner($homeContent->image) }}" class="img-fluid"
                            alt="Banner image">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ======================= banner end  ============================ -->

    <!-- ======================= how it work start  ============================ -->
    <div class="how-it-work pb-5">
        <div class="container">
            <div class="section-header text-center pb-5">
                <h3 class="title mb-4">
                    @if ($localLanguage == 'en')
                        {{ $homeContent->col3_en }}
                    @else
                        {{ $homeContent->col3_gr }}
                    @endif
                </h3>
                {{-- <h3 class="title mb-4">{{ __('messages.home.how_it_work') }}</h3> --}}
                {{-- <h4 class="subheading">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus tenetur
                        praesentium blanditiis.</h4> --}}
                <h4 class="subheading">
                    @if ($localLanguage == 'en')
                        {!! nl2br($homeContent->col4_en) !!}
                    @else
                        {!! nl2br($homeContent->col4_gr) !!}
                    @endif
                </h4>
            </div>
            <div class="row gy-4 gy-xl-0">
                <div class="col-xl-6">
                    <div class="row gy-4 gy-lg-0">
                        <div class="col-md-6">
                            <div class="how_it_work_card shadow-sm text-center text-md-start">
                                <div class="card-body">
                                    <div class="icon mb-3">
                                        <img src="{{ asset('assets/images/icons/1.png') }}" class="img-fluid"
                                            width="150" alt="Image">
                                    </div>
                                    {{-- <h4>{{ __('messages.home.create_account') }}</h4> --}}
                                    <h4>
                                        @if ($localLanguage == 'en')
                                            {{ $homeContent->col7_en }}
                                        @else
                                            {{ $homeContent->col7_gr }}
                                        @endif
                                    </h4>
                                    {{-- <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus tenetur
                                            praesentium blanditiis.
                                        </p> --}}
                                    <p>
                                        @if ($localLanguage == 'en')
                                            {!! nl2br($homeContent->col8_en) !!}
                                        @else
                                            {!! nl2br($homeContent->col8_gr) !!}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="how_it_work_card shadow-sm mt-lg-5 text-center text-md-start">
                                <div class="card-body">
                                    <div class="icon mb-3">
                                        <img src="{{ asset('assets/images/icons/2.png') }}" class="img-fluid"
                                            width="150" alt="Image">
                                    </div>
                                    {{-- <h4>{{ __('messages.home.login_dashboard') }}</h4> --}}
                                    <h4>
                                        @if ($localLanguage == 'en')
                                            {{ $homeContent->col9_en }}
                                        @else
                                            {{ $homeContent->col9_gr }}
                                        @endif
                                    </h4>
                                    <p>
                                        @if ($localLanguage == 'en')
                                            {!! nl2br($homeContent->col10_en) !!}
                                        @else
                                            {!! nl2br($homeContent->col10_gr) !!}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="how_it_work_card shadow-sm text-center text-md-start">
                                <div class="card-body">
                                    <div class="icon mb-3">
                                        <img src="{{ asset('assets/images/icons/3.png') }}" class="img-fluid"
                                            width="150" alt="Image">
                                    </div>
                                    {{-- <h4>{{ __('messages.home.create_vcard') }}</h4> --}}
                                    <h4>
                                        @if ($localLanguage == 'en')
                                            {{ $homeContent->col11_en }}
                                        @else
                                            {{ $homeContent->col11_gr }}
                                        @endif
                                    </h4>
                                    <p>
                                        @if ($localLanguage == 'en')
                                            {!! nl2br($homeContent->col12_en) !!}
                                        @else
                                            {!! nl2br($homeContent->col12_gr) !!}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="how_it_work_card shadow-sm mb-lg-5 mt-lg-5 text-center text-md-start">
                                <div class="card-body">
                                    <div class="icon mb-3">
                                        <img src="{{ asset('assets/images/icons/4.png') }}" class="img-fluid"
                                            width="150" alt="Image">
                                    </div>
                                    {{-- <h4>{{ __('messages.home.share_vcard') }}</h4> --}}
                                    <h4>
                                        @if ($localLanguage == 'en')
                                            {{ $homeContent->col13_en }}
                                        @else
                                            {{ $homeContent->col13_gr }}
                                        @endif
                                    </h4>
                                    <p>
                                        @if ($localLanguage == 'en')
                                            {!! nl2br($homeContent->col14_en) !!}
                                        @else
                                            {!! nl2br($homeContent->col14_gr) !!}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 offset-xl-1">
                    <div class="how_it_work_content mt-0 mt-xl-5">
                        {{-- <h3 class="mb-4">{{ __('messages.home.get_all_your_steps') }}.</h3> --}}
                        <h3 class="mb-4">
                            @if ($localLanguage == 'en')
                                {{ $homeContent->col5_en }}
                            @else
                                {{ $homeContent->col5_gr }}
                            @endif
                        </h3>
                        {{-- <p>{{ __('messages.home.full_service_offering') }}.</p> --}}
                        <p>
                            @if ($localLanguage == 'en')
                                {!! nl2br($homeContent->col6_en) !!}
                            @else
                                {!! nl2br($homeContent->col6_gr) !!}
                            @endif
                        </p>
                        <a href="{{ route('frontend.about') }}" class="btn btn-primary rounded mt-3">
                            {{ __('messages.common.more_details') }}
                            <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ======================= how it work end  ============================ -->

    <!-- ======================= pricing start  ============================ -->
    <div class="pricing-section pt-8 pb-5 ">
        <div class="container">
            <div class="section-header text-center pb-5">
                {{-- <h3 class="title mb-4">{{ __('messages.common.pricing') }}</h3> --}}
                <h3 class="title mb-4">
                    @if ($localLanguage == 'en')
                        {{ $homeContent->col15_en }}
                    @else
                        {{ $homeContent->col15_gr }}
                    @endif
                </h3>
                <h4 class="subheading">
                    @if ($localLanguage == 'en')
                        {!! nl2br($homeContent->col16_en) !!}
                    @else
                        {!! nl2br($homeContent->col16_gr) !!}
                    @endif
                </h4>
                {{-- <h4 class="subheading">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum, commodi
                        fugiat sed amet saepe officiis. Ratione excepturi eius perspiciatis corrupti.</h4> --}}
            </div>
            <div class="row gy-4 gy-lg-0 d-flex justify-content-center">
                @foreach ($plans as $row)
                    <div class="col-lg-4 mb-3">
                        <div class="card pricing border-0 rounded shadow-sm h-100" style="background-color: {{$row->bg_color}};">
                            <div class="card-body">
                                <div class="text-center">
                                    <h4 class="mb-4">
                                        @if ($localLanguage == 'en')
                                            {{ $row->name }}
                                        @elseif($localLanguage == 'de')
                                            {{ $row->name_de }}
                                        @endif
                                        @if (auth()->check() && auth()->user()->current_pan_id == $row->id)
                                            <span class="text-light">({{ __('messages.common.current') }})</span>
                                        @endif
                                    </h4>
                                    <div class="pricing-price">
                                        <sup>{{ $row->currency }}</sup>
                                        {{-- @if(floor($row->price) == $row->price)
                                            {{ number_format($row->price, 0, '.', ',') }}
                                        @else --}}
                                        {{ number_format($row->price, 2, ',', '') }}
                                        {{-- @endif --}}
                                        <span class="pricing-price-period">/
                                            {{ $row->frequency == '1' ? __('messages.plan.monthly') : __('messages.plan.yearly') }}</span>
                                    </div>
                                </div>
                                <ul class="fa-ul pricing-list mt-4">
                                    <li>{{ __('messages.user_dashboard.no_of_vcards') }} {{ $row->no_of_vcards }}</li>
                                    {{-- <li>{{ __('messages.user_dashboard.analytics') }}
                                        {{ $row->analytics == '1' ? '(Yes)' : '(No)' }}</li> --}}
                                    <li>{{ __('messages.user_dashboard.self_branding') }}
                                        {{ $row->self_branding == '1' ? '(Yes)' : '(No)' }}</li>
                                    @foreach ($row->features as $feature)
                                        @if ($localLanguage == 'en')
                                            <li>{{ $feature->feature_name }}</li>
                                        @elseif($localLanguage == 'de')
                                            <li>{{ $feature->feature_name_de }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                            @if ($row->is_default != '1')
                                <div class="card-footer d-flex justify-content-center" style="background-color: {{$row->bg_color}};">
                                    <a href="{{ auth()->check() ? route('user.upgrade.plan') : route('login') }}"
                                        class="btn btn-primary mb-3">{{ __('messages.plan.choose_plan') }}</a>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- ======================= pricing end  ============================ -->

    <!-- ======================= faq start  ============================ -->
    <div class="faq-section pt-5 pb-5">
        <div class="container">
            <div class="section-header text-center pb-5">
                {{-- <h3 class="title mb-4">{{ __('messages.faq.faq') }}</h3> --}}
                <h3 class="title mb-4">
                    @if ($localLanguage == 'en')
                        {{ $homeContent->col17_en }}
                    @else
                        {{ $homeContent->col17_gr }}
                    @endif
                </h3>
                <h4 class="subheading">
                    @if ($localLanguage == 'en')
                        {!! nl2br($homeContent->col18_en) !!}
                    @else
                        {!! nl2br($homeContent->col18_gr) !!}
                    @endif
                </h4>
                {{-- <h4 class="subheading">{{ __('messages.faq.send_us_mail') }}</h4> --}}
            </div>
            <div class="row align-items-center d-flex">
                <div class="col-lg-5">
                    <div class="faq-img text-center text-lg-start">
                        <img src="{{ $homeContent->faq_image ?? asset('assets/images/faq.png') }}" width="350" class="img-fluid"
                            alt="">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="faq-list">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            @foreach ($faqs as $key => $row)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading_{{ $key }}">
                                        <button class="accordion-button {{ $key != 0 ? 'collapsed' : '' }}"
                                            type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapse_{{ $key }}" aria-expanded="true"
                                            aria-controls="collapse_{{ $key }}">
                                            {{ $localLanguage == 'de'
                                                ? (!empty($row->title_de)
                                                    ? $row->title_de
                                                    : $row->title)
                                                : (!empty($row->title)
                                                    ? $row->title
                                                    : $row->title_de) }}
                                        </button>
                                    </h2>
                                    <div id="flush-collapse_{{ $key }}"
                                        class="accordion-collapse collapse {{ $key == 0 ? 'show' : '' }}"
                                        aria-labelledby="heading_{{ $key }}"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <p>{{ $localLanguage == 'de'
                                                ? (!empty($row->body_de)
                                                    ? $row->body_de
                                                    : $row->body)
                                                : (!empty($row->body)
                                                    ? $row->body
                                                    : $row->body_de) }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ======================= faq end  ============================ -->
    {{-- Testimonial section --}}
    <div class="container my-5">
        <div class="section-header text-center pb-5">
            <h2 class="title mb-4">
                @if ($localLanguage == 'en')
                        {{ $homeContent->col20_en }}
                    @else
                        {{ $homeContent->col21_gr }}
                    @endif
            </h2>
        </div>
        <div class="row justify-content-center gx-5">
            <!-- Testimonial 1 -->
            @foreach ($testimonials as $item)
                @php
                    // Generate random background color
                    $randomColor = '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
                @endphp
                <div class="col-md-6 col-lg-4 mb-3">
                    <div class="testimonial">
                        <div class="testinonal-content" style="background-color: {{ $randomColor }}; color: #fff; padding: 15px;">
                            {{ $localLanguage == 'de' ? $item->details_de : $item->details }}
                        </div>
                        <div class="pointer" style="background-color: {{ $randomColor }}; color: #fff; padding: 10px;"></div>
                        <div class="d-flex position-relative author-info">
                            <img src="{{ getProfile($item->image) }}" class="flex-shrink-0 me-3 author-image"
                                alt="...">
                            <div>
                                <p class="author-name">{{ $item->name }}</p>
                                <p class="author-title">{{ $item->designation }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!--     end testimonial    --!->
@endsection

@push('script')
@endpush
