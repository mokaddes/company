@extends('admin.layouts.master')


@section('settings_menu', 'menu-open')
@section('home', 'active')

@section('title') {{ $data['title'] ?? '' }} @endsection

@push('style')
@endpush

@section('content')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $data['title'] ?? 'Page Header' }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('Settings') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="content">
                <div class="container-fluid">
                    <div>
                        @if (Session::get('success'))
                            <div class="col-lg-12">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ Session::get('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        @endif
                        <div class="col-lg-12">
                            <form action="{{route('admin.settings.homeContent.update')}}" method="post"
                                enctype="multipart/form-data" id="settingUpdate">
                                @csrf
                                <div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">{{__('messages.settings_home_content.banner_section')}}</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <img src="{{($home->image ?? asset('assets/default.png'))}}" height="50px" />
                                                    <div class="mb-3">
                                                        <label class="form-label">{{ __('messages.settings_home_content.banner_image') }}
                                                            <br><small class="text-info fw-bold"><strong>({{__('messages.settings_home_content.recommended_size')}} 450X450px)</strong></small>
                                                        </label>
                                                        <input type="file" class="form-control" name="image"
                                                            placeholder="{{ __('Banner image') }}..."
                                                            accept=".png,.jpg,.jpeg,.gif,.svg" />
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">{{ __('messages.settings_home_content.banner_heading') }} (en)</label>
                                                        <input type="text" class="form-control" name="banner_heading_en"
                                                            value="{{$home->col1_en ?? ''}}"
                                                            placeholder="{{ __('messages.settings_home_content.banner_heading_english') }}..." required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">{{ __('messages.settings_home_content.banner_heading') }} (ger)</label>
                                                        <input type="text" class="form-control" name="banner_heading_gr"
                                                            value="{{$home->col1_gr ?? ''}}"
                                                            placeholder="{{ __('messages.settings_home_content.banner_heading_german') }}..." required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label required">{{ __('messages.settings_home_content.banner_sub_heading') }} (en)</label>
                                                        <input type="text" class="form-control" name="bannerSubheading_en"
                                                            value="{{$home->col2_en ?? ''}}"
                                                            placeholder="{{ __('messages.settings_home_content.banner_sub_heading_english') }}..." required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label required">{{ __('messages.settings_home_content.banner_sub_heading') }} (ger)</label>
                                                        <input type="text" class="form-control" name="bannerSubheading_gr"
                                                            value="{{$home->col2_gr ?? ''}}"
                                                            placeholder="{{ __('messages.settings_home_content.banner_sub_heading_german') }}..." required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- How It Work Section --}}
                                <div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">{{__('messages.settings_home_content.how_it_work_section')}}</h3>
                                        </div>
                                        <div class="card-body">
                                            <div>
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label required">{{ __('messages.settings_home_content.section_heading') }} (en)</label>
                                                        <input type="text" class="form-control" name="hiws_heading_en"
                                                            value="{{$home->col3_en ?? ''}}"
                                                            placeholder="{{ __('messages.settings_home_content.section_heading_english') }}..." required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label required">{{ __('messages.settings_home_content.section_heading') }} (ger)</label>
                                                        <input type="text" class="form-control" name="hiws_heading_gr"
                                                            value="{{$home->col3_gr ?? ''}}"
                                                            placeholder="{{ __('messages.settings_home_content.section_heading_german') }}..." required>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label required">{{ __('messages.settings_home_content.section_sub_heading') }} (en)</label>
                                                        <textarea class="form-control" name="hiws_subheading_en" rows="3" placeholder="{{ __('messages.settings_home_content.section_sub_heading_english') }}"
                                                            style="height: 80px !important;" required>{{$home->col4_en ?? ''}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label required">{{ __('messages.settings_home_content.section_sub_heading') }} (ger)</label>
                                                        <textarea class="form-control" name="hiws_subheading_gr" rows="3" placeholder="{{ __('messages.settings_home_content.section_sub_heading_german') }}"
                                                            style="height: 80px !important;" required>{{$home->col4_gr ?? ''}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label required">{{ __('messages.settings_home_content.title') }} (en)</label>
                                                        <input type="text" class="form-control" name="hiws_title_en"
                                                            value="{{$home->col5_en ?? ''}}"
                                                            placeholder="{{ __('messages.settings_home_content.title_english') }}..." required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label required">{{ __('messages.settings_home_content.title') }} (ger)</label>
                                                        <input type="text" class="form-control" name="hiws_title_gr"
                                                            value="{{$home->col5_gr ?? ''}}"
                                                            placeholder="{{ __('messages.settings_home_content.title_german') }}..." required>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label required">{{ __('messages.settings_home_content.description') }} (en)</label>
                                                        <textarea class="form-control" name="hiws_description_en" rows="3" placeholder="{{ __('messages.settings_home_content.description_english') }}"
                                                            style="height: 100px !important;" required>{{$home->col6_en ?? ''}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label required">{{ __('messages.settings_home_content.description') }} (ger)</label>
                                                        <textarea class="form-control" name="hiws_description_gr" rows="3" placeholder="{{ __('messages.settings_home_content.description_german') }}"
                                                            style="height: 100px !important;" required>{{$home->col6_gr ?? ''}}</textarea>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label required">{{ __('messages.settings_home_content.card_1_title') }} (en)</label>
                                                        <input type="text" class="form-control" name="card1_title_en"
                                                            value="{{$home->col7_en ?? ''}}"
                                                            placeholder="{{ __('messages.settings_home_content.card_title_english') }}..." required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label required">{{ __('messages.settings_home_content.card_1_title') }} (ger)</label>
                                                        <input type="text" class="form-control" name="card1_title_gr"
                                                            value="{{$home->col7_gr ?? ''}}"
                                                            placeholder="{{ __('messages.settings_home_content.card_title_german') }}..." required>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label required">{{ __('messages.settings_home_content.card_1_sub_title') }} (en)</label>
                                                        <textarea class="form-control" name="card1_subtitle_en" rows="3" placeholder="{{ __('messages.settings_home_content.card_sub_title_english') }}"
                                                            style="height: 80px !important;" required>{{$home->col8_en ?? ''}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label required">{{ __('messages.settings_home_content.card_1_sub_title') }} (ger)</label>
                                                        <textarea class="form-control" name="card1_subtitle_gr" rows="3" placeholder="{{ __('messages.settings_home_content.card_sub_title_german') }}"
                                                            style="height: 80px !important;" required>{{$home->col8_gr ?? ''}}</textarea>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label required">{{ __('messages.settings_home_content.card_2_title') }} (en)</label>
                                                        <input type="text" class="form-control" name="card2_title_en"
                                                            value="{{$home->col9_en ?? ''}}"
                                                            placeholder="{{ __('messages.settings_home_content.card_title_english') }}..." required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label required">{{ __('messages.settings_home_content.card_2_title') }} (ger)</label>
                                                        <input type="text" class="form-control" name="card2_title_gr"
                                                            value="{{$home->col9_gr ?? ''}}"
                                                            placeholder="{{ __('messages.settings_home_content.card_title_german') }}..." required>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label required">{{ __('messages.settings_home_content.card_2_sub_title') }} (en)</label>
                                                        <textarea class="form-control" name="card2_subtitle_en" rows="3" placeholder="{{ __('messages.settings_home_content.card_sub_title_english') }}"
                                                            style="height: 80px !important;" required>{{$home->col10_en ?? ''}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label required">{{ __('messages.settings_home_content.card_2_sub_title') }} (ger)</label>
                                                        <textarea class="form-control" name="card2_subtitle_gr" rows="3" placeholder="{{ __('messages.settings_home_content.card_sub_title_german') }}"
                                                            style="height: 80px !important;" required>{{$home->col10_gr ?? ''}}</textarea>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label required">{{ __('messages.settings_home_content.card_3_title') }} (en)</label>
                                                        <input type="text" class="form-control" name="card3_title_en"
                                                            value="{{$home->col11_en ?? ''}}"
                                                            placeholder="{{ __('messages.settings_home_content.card_title_english') }}..." required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label required">{{ __('messages.settings_home_content.card_3_title') }} (ger)</label>
                                                        <input type="text" class="form-control" name="card3_title_gr"
                                                            value="{{$home->col11_gr ?? ''}}"
                                                            placeholder="{{ __('messages.settings_home_content.card_title_german') }}..." required>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label required">{{ __('messages.settings_home_content.card_3_sub_title') }} (en)</label>
                                                        <textarea class="form-control" name="card3_subtitle_en" rows="3" placeholder="{{ __('messages.settings_home_content.card_sub_title_english') }}"
                                                            style="height: 80px !important;" required>{{$home->col12_en ?? ''}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label required">{{ __('messages.settings_home_content.card_3_sub_title') }} (ger)</label>
                                                        <textarea class="form-control" name="card3_subtitle_gr" rows="3" placeholder="{{ __('messages.settings_home_content.card_sub_title_german') }}"
                                                            style="height: 80px !important;" required>{{$home->col12_gr ?? ''}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label required">{{ __('messages.settings_home_content.card_4_title') }} (en)</label>
                                                        <input type="text" class="form-control" name="card4_title_en"
                                                            value="{{$home->col13_en ?? ''}}"
                                                            placeholder="{{ __('messages.settings_home_content.card_title_english') }}..." required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label required">{{ __('messages.settings_home_content.card_4_title') }} (ger)</label>
                                                        <input type="text" class="form-control" name="card4_title_gr"
                                                            value="{{$home->col13_gr ?? ''}}"
                                                            placeholder="{{ __('messages.settings_home_content.card_title_german') }}..." required>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label required">{{ __('messages.settings_home_content.card_4_sub_title') }} (en)</label>
                                                        <textarea class="form-control" name="card4_subtitle_en" rows="3" placeholder="{{ __('messages.settings_home_content.card_sub_title_english') }}"
                                                            style="height: 80px !important;" required>{{$home->col14_en ?? ''}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label required">{{ __('messages.settings_home_content.card_4_sub_title') }} (ger)</label>
                                                        <textarea class="form-control" name="card4_subtitle_gr" rows="3" placeholder="{{ __('messages.settings_home_content.card_sub_title_german') }}"
                                                            style="height: 80px !important;" required>{{$home->col14_gr ?? ''}}</textarea>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Pricing --}}
                                <div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">{{__('messages.settings_home_content.pricing_section')}}</h3>
                                        </div>
                                        <div class="card-body">
                                            <div>
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label required">{{ __('messages.settings_home_content.section_heading') }} (en)</label>
                                                        <input type="text" class="form-control" name="price_heading_en"
                                                            value="{{$home->col15_en ?? ''}}"
                                                            placeholder="{{ __('messages.settings_home_content.section_heading_english') }}..." required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label required">{{ __('messages.settings_home_content.section_heading') }} (ger)</label>
                                                        <input type="text" class="form-control" name="price_heading_gr"
                                                            value="{{$home->col15_gr ?? ''}}"
                                                            placeholder="{{ __('messages.settings_home_content.section_heading_german') }}..." required>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label required">{{ __('messages.settings_home_content.section_sub_heading') }} (en)</label>
                                                        <textarea class="form-control" name="price_subheading_en" rows="3" placeholder="{{ __('messages.settings_home_content.section_sub_heading_english') }}"
                                                            style="height: 100px !important;" required>{{$home->col16_en ?? ''}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label required">{{ __('messages.settings_home_content.section_sub_heading') }} (ger)</label>
                                                        <textarea class="form-control" name="price_subheading_gr" rows="3" placeholder="{{ __('messages.settings_home_content.section_sub_heading_german') }}"
                                                            style="height: 100px !important;" required>{{$home->col16_gr ?? ''}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                 {{-- FAQ --}}
                                 <div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">{{__('messages.settings_home_content.faq_section')}}</h3>
                                        </div>
                                        <div class="card-body">
                                            <div>
                                                <div class="col-lg-12">
                                                    <img src="{{($home->faq_image ?? asset('assets/default.png'))}}" height="50px" />
                                                    <div class="mb-3">
                                                        <label class="form-label">{{ __('messages.settings_home_content.faq_image') }}
                                                            <br><small class="text-info fw-bold"><strong>({{__('messages.settings_home_content.recommended_size')}} 450X450px)</strong></small>
                                                        </label>
                                                        <input type="file" class="form-control" name="faq_image"
                                                            placeholder="{{ __('Faq image') }}..."
                                                            accept=".png,.jpg,.jpeg,.gif,.svg" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label required">{{ __('messages.settings_home_content.section_heading') }} (en)</label>
                                                        <input type="text" class="form-control" name="faq_heading_en"
                                                            value="{{$home->col17_en ?? ''}}"
                                                            placeholder="{{ __('messages.settings_home_content.section_heading_english') }}..." required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label required">{{ __('messages.settings_home_content.section_heading') }} (ger)</label>
                                                        <input type="text" class="form-control" name="faq_heading_gr"
                                                            value="{{$home->col17_gr ?? ''}}"
                                                            placeholder="{{ __('messages.settings_home_content.section_heading_german') }}..." required>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label required">{{ __('messages.settings_home_content.section_sub_heading') }} (en)</label>
                                                        <textarea class="form-control" name="faq_subheading_en" rows="3" placeholder="{{ __('messages.settings_home_content.section_sub_heading_english') }}"
                                                            style="height: 80px !important;" required>{{$home->col18_en ?? ''}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label required">{{ __('messages.settings_home_content.section_sub_heading') }} (ger)</label>
                                                        <textarea class="form-control" name="faq_subheading_gr" rows="3" placeholder="{{ __('messages.settings_home_content.section_sub_heading_german') }}"
                                                            style="height: 80px !important;" required>{{$home->col18_gr ?? ''}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- FAQ --}}

                                {{-- testimonial --}}
                                <div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">{{__('messages.settings_home_content.testimonial_section')}}</h3>
                                        </div>
                                        <div class="card-body">
                                            <div>
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label class="form-label required">{{ __('messages.settings_home_content.section_heading') }} (en)</label>
                                                        <input type="text" class="form-control" name="testimonial_heading_en"
                                                            value="{{$home->col20_en ?? ''}}"
                                                            placeholder="{{ __('messages.settings_home_content.section_heading_english') }}..." required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label class="form-label required">{{ __('messages.settings_home_content.section_heading') }} (ger)</label>
                                                        <input type="text" class="form-control" name="testimonial_heading_gr"
                                                            value="{{$home->col21_gr ?? ''}}" placeholder="{{ __('messages.settings_home_content.section_heading_german') }}..." required>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">{{__('messages.settings_home_content.promotion_section')}}</h3>
                                        </div>
                                        <div class="card-body">
                                            <div>
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label required">{{ __('messages.settings_home_content.content') }} (en)</label>
                                                        <input type="text" class="form-control" name="hero_content_en"
                                                            value="{{$home->col19_en ?? ''}}"
                                                            placeholder="{{ __('messages.settings_home_content.hero_content_english') }}..." required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label required">{{ __('messages.settings_home_content.content') }} (ger)</label>
                                                        <input type="text" class="form-control" name="hero_content_gr"
                                                            value="{{$home->col19_gr ?? ''}}"
                                                            placeholder="{{ __('messages.settings_home_content.hero_content_german') }}..." required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card p-3">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <button type="submit" class="btn btn-success"
                                                id="updateButton">{{__('messages.common.update')}}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-8">
            <iframe src="{{route('frontend.home')}}" width="100%" height="100%" style="border: none;"></iframe>
        </div>
    </div>
</div>


@endsection

@push('script')
    <script>
        const form = document.getElementById("settingUpdate");
        const submitButton = form.querySelector("button[type='submit']");

        form.addEventListener("submit", function() {

            $("#updateButton").html(`
                <span id="">
                    <span class="spinner-border spinner-border-sm text-white" role="status" aria-hidden="true"></span>
                    Updating Setting...
                </span>
            `);

            submitButton.disabled = true;

        });
    </script>
@endpush
