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
    iframe {
        width: 100% !important;
        height: 350px !important;
    }
</style>
@endpush

@section('content')
    <!-- ======================= breadcrumb start  ============================ -->
    @section('breadcrumb')
        <li class="breadcrumb-item">{{ __('messages.nav.contact') }}</li>
    @endsection
    <!-- ======================= breadcrumb end  ============================ -->

    <!-- ======================= contact start  ============================ -->
    <div class="contact-section pt-5 pb-5">
        <div class="container">
            <div class="row mb-5 gy-5 gy-lg-0">
                <div class="col-lg-5">
                    <div class="contact-info p-sm-0 p-md-3 p-lg-3 px-lg-5">
                        @if(isset($setting->office_address))
                            <div class="d-flex flex-row mb-3">
                                <div>
                                    <div class="icon pe-3">
                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-map-pin"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" /><path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" /></svg>
                                    </div>
                                </div>
                                <div class="align-self-start justify-content-start">
                                    <h5 class="mb-1">{{ __('messages.common.address') }}</h5>
                                    <address>{!! nl2br( $setting->office_address) !!}</address>
                                </div>
                            </div>

                        @endif
                        @if(isset($setting->phone_no))
                                <div class="d-flex flex-row mb-3">
                                    <div>
                                        <div class="icon pe-3">
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-phone-call"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" /><path d="M15 7a2 2 0 0 1 2 2" /><path d="M15 3a6 6 0 0 1 6 6" /></svg>
                                        </div>
                                    </div>
                                    <div>
                                        <h5 class="mb-1">{{ __('messages.common.phone') }}</h5>
                                        <p class="mb-0">
                                            <a href="tel:{{ $setting->phone_no }}" class="link-body">{{ $setting->phone_no }}</a>
                                        </p>
                                    </div>
                                </div>

                        @endif
                        @if(isset($setting->email))
                                <div class="d-flex flex-row">
                                    <div>
                                        <div class="icon pe-3">
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-mail-opened"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 9l9 6l9 -6l-9 -6l-9 6" /><path d="M21 9v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10" /><path d="M3 19l6 -6" /><path d="M15 13l6 6" /></svg>
                                        </div>
                                    </div>
                                    <div>
                                        <h5 class="mb-1">{{ __('messages.common.email') }}</h5>
                                        <p class="mb-0">
                                            <a href="mailto:{{ $setting->email }}" class="link-body">{{ $setting->email }}</a>
                                        </p>
                                    </div>
                                </div>

                        @endif
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="contact-form ">
                        <div class="mb-5">
                            <h1>{{ __('messages.contact.leave_message') }}</h1>
                            <h5>{{ __('messages.contact.reach_out_us') }}</h5>
                        </div>
                        <form action="{{route('frontend.contact.submit')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="first_name" class="form-label">{{ __('messages.common.first_name') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="first_name" autofocus id="first_name" value="{{old('first_name')}}"
                                            class="form-control" required placeholder="{{ __('messages.placeholder.your_first_name') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="last_name" class="form-label">{{ __('messages.common.last_name') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="last_name" id="last_name" class="form-control" required
                                            placeholder="{{ __('messages.placeholder.your_last_name') }}" value="{{old('last_name')}}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">{{ __('messages.common.email') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="email" name="email" id="email" class="form-control" required
                                            placeholder="{{ __('messages.placeholder.your_email') }}" value="{{old('email')}}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="message" class="form-label">{{ __('messages.common.message') }} <span
                                                class="text-danger">*</span></label>
                                        <textarea name="message" id="message" class="form-control" required
                                            placeholder="{{ __('messages.placeholder.your_message') }}" cols="30" rows="5">{{old('message')}}</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary px-4">
                                        {{ __('messages.common.submit') }}
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-send">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M10 14l11 -11" />
                                            <path
                                                d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="map">
                @if(!empty($setting->map_link))
                    {!! $setting->map_link !!}
                @else
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d155421.70603774732!2d13.259927537862056!3d52.50693861620781!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47a84e373f035901%3A0x42120465b5e3b70!2sBerlin%2C%20Germany!5e0!3m2!1sen!2sbd!4v1716707601154!5m2!1sen!2sbd" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                @endif
            </div>
        </div>
    </div>
    <!-- ======================= contact end  ============================ -->
@endsection

@push('script')
@endpush
