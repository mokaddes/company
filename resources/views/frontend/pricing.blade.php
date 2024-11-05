@extends('frontend.layouts.app')

@section('title')
{{ $title ?? 'Venmeo.de' }}
@endsection

@section('meta')
    <meta property="og:title" content="{{ $seo->title ?? $og_title }}" />
    <meta property="og:description" content="{{ $seo->description ?? $og_description }}" />
    <meta property="og:image" content="{{ asset($seo->image ?? $og_image) }}" />
    <meta name="description" content="{{$seo->meta_description ?? $og_description}}">
    <meta name="keywords" content="{{$seo->keywords ?? $meta_keywords}}">
@endsection

@push('style')
<style>
    .card-footer {
        background-color: #ffffff;
        border-top: none;
    }
    /* @media (max-width: 768px) {
        .fa-ul {
            margin-left: 0 !important;
        }
    } */
</style>
@endpush
@php
    $lang = checkFrontLanguageSession() ?? geDefaultLanguage()->iso_code;
@endphp
@section('content')
    <!-- ======================= breadcrumb start  ============================ -->
    @section('breadcrumb')
        <li class="breadcrumb-item">{{ __('messages.common.pricing') }}</li>
    @endsection
    <!-- ======================= breadcrumb end  ============================ -->

    <!-- ======================= pricing start  ============================ -->
    <div class="pricing-section pt-5 pb-5">
        <div class="container">
            <div class="section-header text-center pb-5">
                <h3 class="title mb-4">{{ __('messages.common.pricing') }}</h3>
                <h4 class="subheading">
                    @if ($lang == 'en')
                        {!! nl2br($homeContent->col16_en) !!}
                    @else
                        {!! nl2br($homeContent->col16_gr) !!}
                    @endif
                </h4>
            </div>
            <div class="row gy-4 gy-lg-0 d-flex justify-content-center">
                @foreach ($plans as $row)
                    <div class="col-lg-4 mb-3">
                        <div class="card pricing border-0 rounded shadow-sm h-100" style="background-color: {{$row->bg_color}};">
                            <div class="card-body">
                                <div class="text-center">
                                    <h4 class="mb-4">
                                        @if ($lang == 'en')
                                            {{$row->name}}
                                        @elseif($lang == 'de')
                                            {{$row->name_de}}
                                        @endif
                                        @if(auth()->check() && auth()->user()->current_pan_id == $row->id)
                                            <span class="text-success">({{__('messages.common.current')}})</span>
                                        @endif
                                    </h4>
                                    <div class="pricing-price">
                                        <sup>{{$row->currency}}</sup>
                                        {{-- @if(floor($row->price) == $row->price)
                                            {{ number_format($row->price, 0, '.', ',') }}
                                        @else --}}
                                        {{ number_format($row->price, 2, ',', '') }}
                                        {{-- @endif --}}
                                        <span class="pricing-price-period">/ {{$row->frequency == '1' ? __('messages.plan.monthly') : __('messages.plan.yearly') }}</span>
                                    </div>
                                </div>
                                <ul class="fa-ul pricing-list mt-4">
                                    <li>{{ __('messages.user_dashboard.no_of_vcards') }} {{ $row->no_of_vcards }}</li>
                                    {{-- <li>{{ __('messages.user_dashboard.analytics') }} {{ $row->analytics == '1' ? '(Yes)' : '(No)' }}</li> --}}
                                    <li>{{ __('messages.user_dashboard.self_branding') }} {{ $row->self_branding == '1' ? '(Yes)' : '(No)' }}</li>
                                    @foreach ($row->features as $feature)
                                        @if ($lang == 'en')
                                            <li>{{$feature->feature_name}}</li>
                                        @elseif($lang == 'de')
                                            <li>{{$feature->feature_name_de}}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                            <div class="card-footer d-flex justify-content-center" style="background-color: {{$row->bg_color}};">
                                @if($row->is_default != '1')
                                <a href="{{auth()->check() ? route('user.upgrade.plan') : route('login')}}" class="btn btn-primary mb-3">{{ __('messages.plan.choose_plan') }}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- ======================= pricing end  ============================ -->
@endsection

@push('script')
@endpush
