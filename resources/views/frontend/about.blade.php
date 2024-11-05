@extends('frontend.layouts.app')

@section('title')
{{ $title ?? 'Venmeo.de' }}
@endsection

@section('meta')
    <meta property="og:title" content="{{$row->meta_title ?? $og_title}}" />
    <meta property="og:description" content="{{$row->meta_description ?? $og_description}}" />
    <meta property="og:image" content="{{asset($og_image)}}" />
    <meta name="description" content="{{$row->meta_description ?? $og_description}}">
    <meta name="keywords" content="{{$row->meta_keywords ?? $meta_keywords}}">
@endsection

@push('style')
@endpush
@php
    $localLanguage = session()->get('languageName') ?? geDefaultLanguage()->iso_code;
@endphp
@section('content')
    <!-- ======================= breadcrumb start  ============================ -->
    @section('breadcrumb')
        <li class="breadcrumb-item">{{$title}}</li>
    @endsection
    <!-- ======================= breadcrumb end  ============================ -->

    <!-- ======================= about start  ============================ -->
        <div class="about-section pt-5 pb-5">
            <div class="container">
                <div class="row gy-4 gy-lg-0 d-flex align-items-center">
                    <div class="col-lg-5 order-lg-2">
                        <div class="about-img">
                            @if(!empty($row->image_1))
                                <img src="{{asset($row->image_1)}}" class="img-fluid rounded" alt="Image">
                            @else
                                <img src="assets/images/about.jpg" class="img-fluid rounded" alt="Image">
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-7 order-lg-1">
                        <div class="about_content">
                            @if($localLanguage == 'en')

                                {!! $row->content_1 !!}
                            @else
                                {!! $row->content_1_de !!}
            
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- ======================= about end  ============================ -->
@endsection

@push('script')
@endpush
