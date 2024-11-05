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
@endpush
@php
    $localLanguage = Session::get('languageName');
@endphp
@section('content')
    <!-- ======================= breadcrumb start  ============================ -->
    @section('breadcrumb')
        <li class="breadcrumb-item">Faq</li>
    @endsection
    <!-- ======================= breadcrumb end  ============================ -->
    <!-- ======================= faq start  ============================ -->
    <div class="faq-section pt-5 pb-5">
        <div class="container">
            <div class="section-header text-center pb-5">
                <h3 class="title mb-4">{{ __('messages.faq.faq') }}</h3>
                <h4 class="subheading">
                    {{ __('messages.faq.send_us_mail') }}
                </h4>
            </div>
            <div class="row align-items-center d-flex">
                <div class="col-lg-7 order-lg-2">
                    <div class="faq-list">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            @foreach ($faqs as $key => $row)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading_{{ $key }}">
                                    <button class="accordion-button {{ $key != 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapse_{{ $key }}" aria-expanded="true"
                                        aria-controls="collapse_{{ $key }}">
                                        {{ $localLanguage == 'de' ? (!empty($row->title_de) ? $row->title_de : $row->title) : 
                                        (!empty($row->title) ? $row->title : $row->title_de) }}
                                    </button>
                                </h2>
                                <div id="flush-collapse_{{ $key }}" class="accordion-collapse collapse {{ $key == 0 ? 'show' : '' }}"
                                    aria-labelledby="heading_{{ $key }}" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <p>{{ $localLanguage == 'de' ? (!empty($row->body_de) ? $row->body_de : $row->body) : 
                                         (!empty($row->body) ? $row->body : $row->body_de) }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 order-lg-1">
                    <div class="faq-img text-center text-lg-start">
                        <img src="{{ asset('assets/images/faq2.png')}}" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ======================= faq end  ============================ -->
@endsection

@push('script')
@endpush
