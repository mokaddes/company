@extends('admin.layouts.master')
@section('card', 'active')

@section('title')
    {{ $title ?? '' }}
@endsection
@push('style')
    <link href="{{ asset('assets/css/croppie.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/adminlte/css/custom.css') }}?v=1.0.2" rel="stylesheet"/>
    <style>
        body {
            background: #fff !important;
        }

        .btn-group-sm > .btn, .btn-sm {
            padding: .25rem .5rem !important;
            font-size: .875rem !important;
        }

        @media only screen and (min-width: 960px) {
            .img-crop-modal {
                max-width: 650px !important;
            }

            .img-crop-modal .modal-body {
                padding-top: 15px !important;
            }
        }

        @media only screen and (max-device-width: 480px) {
        }
    </style>
@endpush
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $title ?? 'Cards' }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a
                                    href="{{ route('admin.dashboard') }}">{{__('messages.common.dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{$title}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-xl-8">
                        <div class="card">
                            <div class="card-header">

                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="">
                                        <h4 class="card-title">{{__('messages.common.edit_card')}}</h4>
                                    </div>
                                    <div class="">
                                        <a href="{{route('admin.card.index')}}" class="btn btn-sm btn-primary btn-gradient">Back</a>
                                    </div>
                                </div>


                            </div>
                            <div class="card-body">
                                <form action="{{route('admin.card.update', $card->id)}}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" id="card_id" value="{{ $card->id }}">
                                    <input id="upload_image_url" name="upload_image_url" type="hidden"
                                           value="{{ route('admin.card.upload.image') }}"/>
                                    <input id="upload_cover_url" name="upload_cover_url" type="hidden"
                                           value="{{ route('admin.card.upload.cover') }}"/>
                                    <p><strong>{{__('messages.card.basic_info')}}</strong></p>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" class="form-label">{{__('messages.card.cover_image')}}
                                                    <br><small class="text-info fw-bold"><strong>({{__('messages.settings_home_content.recommended_size')}} 500x200px)</strong></small>
                                                </label>
                                                <input type="file" name="cover_image" id="upload_cover"
                                                       class="form-control">
                                                <input type="hidden" name="cover_image_path" id="cover_image_path"
                                                       value="{{$card->cover_image}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" class="form-label">{{__('messages.card.profile_image')}}
                                                    <br><small class="text-info fw-bold"><strong>({{__('messages.settings_home_content.recommended_size')}} 150x150px)</strong></small>
                                                </label>
                                                <input type="file" name="profile_image" id="upload_image" class="form-control">
                                                <input type="hidden" name="profile_image_path" id="profile_image_path"
                                                       value="{{$card->profile_image}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" class="form-label">{{__('messages.common.first_name')}}
                                                    <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="first_name" value="{{$card->first_name}}"
                                                       class="form-control cin preview_name" data-preview="preview_name"
                                                       data-concat="preview_name"
                                                       placeholder="{{__('messages.common.first_name')}}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" class="form-label">{{__('messages.common.last_name')}}
                                                    <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="last_name" value="{{$card->last_name}}"
                                                       class="form-control cin preview_name" data-preview="preview_name"
                                                       data-concat="preview_name"
                                                       placeholder="{{__('messages.common.last_name')}}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" class="form-label">{{__('messages.common.email')}} <span
                                                        class="text-danger">*</span></label>
                                                <input type="email" name="email" value="{{$card->email}}"
                                                       class="form-control cin preview_email"
                                                       data-preview="preview_email"
                                                       placeholder="{{__('messages.common.email')}}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" class="form-label">{{__('messages.common.phone')}} <span
                                                        class="text-danger">*</span></label>
                                                <input type="tel" name="phone" value="{{$card->phone}}"
                                                       class="form-control cin preview_phone"
                                                       data-preview="preview_phone"
                                                       placeholder="{{__('messages.common.phone')}}"
                                                       oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" class="form-label">{{__('messages.order.telephone')}}</label>
                                                <input type="tel" name="phone_2" class="form-control cin preview_phone_2" data-preview="preview_phone_2" value="{{$card->phone_2}}"
                                                    placeholder="{{__('messages.order.telephone')}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" class="form-label">{{__('messages.common.designation')}}
                                                    <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="designation" value="{{$card->job_title}}"
                                                       class="form-control cin preview_designation"
                                                       data-preview="preview_designation"
                                                       placeholder="{{__('messages.common.designation')}}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" class="form-label">{{__('messages.common.company_name')}}
                                                    <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="company_name" value="{{$card->company}}"
                                                       class="form-control cin preview_company"
                                                       data-preview="preview_company"
                                                       placeholder="{{__('messages.common.company_name')}}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" class="form-label">{{__('messages.common.address')}} <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="address" value="{{$card->location}}"
                                                       class="form-control cin preview_address"
                                                       data-preview="preview_address"
                                                       placeholder="{{__('messages.common.address')}}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for=""
                                                       class="form-label">{{__('messages.common.website')}}</label>
                                                <input type="url" name="website" value="{{$card->icons->website}}"
                                                       class="form-control cin preview_website icon_in"
                                                       data-preview="preview_website"
                                                       placeholder="{{__('messages.common.website')}}"
                                                       data-icon="website">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" class="form-label">{{__('messages.common.website')}}</label>
                                                <input type="url" name="website_2" value="{{$card->icons->website_2}}" class="form-control cin preview_website_2 icon_in" 
                                                    data-preview="preview_website_2" placeholder="{{__('messages.common.website')}}" data-icon="website_2">
                                            </div>
                                        </div>
                                        @if(checkUserPlanFeature($card->user_id, 'self_branding'))
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" class="form-label">{{__('messages.user_dashboard.self_branding')}}</label>
                                                <input type="text" name="self_branding" value="{{$card->self_branding}}" class="form-control cin preview_branding" 
                                                    data-preview="preview_branding" placeholder="{{__('messages.user_dashboard.self_branding')}}">
                                            </div>
                                        </div>
                                        @endif
                                        <div class="col-12">
                                            <hr>
                                            <p><strong>{{__('messages.card.social_media')}}</strong></p>
                                        </div>

                                        <div class="col-md-6 mb-2">
                                            <label for="facebook"
                                                   class="form-label">{{__('messages.card.facebook')}}</label>
                                            <input type="url" name="facebook" value="{{$card->icons->facebook}}"
                                                   placeholder="ex: https://www.facebook.com/venmeo.de"
                                                   class="form-control icon_in" data-icon="facebook">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="twitter"
                                                   class="form-label">{{__('messages.card.twitter')}}</label>
                                            <input type="url" name="twitter" value="{{$card->icons->twitter}}"
                                                   placeholder="ex: https://www.twitter.com/venmeo.de"
                                                   class="form-control icon_in" data-icon="twitter">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="linkedin"
                                                   class="form-label">{{__('messages.card.linkedin')}}</label>
                                            <input type="url" name="linkedin" value="{{$card->icons->linkedin}}"
                                                   placeholder="ex: https://www.linkedin.com/venmeo.de"
                                                   class="form-control icon_in" data-icon="linkedin">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="whatsapp"
                                                   class="form-label">{{__('messages.card.whatsapp')}}</label>
                                            <input type="tel" name="whatsapp" value="{{$card->icons->whatsapp}}"
                                                   oninput="this.value = this.value.replace(/[^0-9.+]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                                   placeholder="ex: +491733910844" class="form-control icon_in"
                                                   data-icon="whatsapp">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="pinterest"
                                                   class="form-label">{{__('messages.card.pinterest')}}</label>
                                            <input type="url" name="pinterest" value="{{$card->icons->pinterest}}"
                                                   placeholder="ex: https://www.pinterest.com/venmeo.de"
                                                   class="form-control icon_in" data-icon="pinterest">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="instagram"
                                                   class="form-label">{{__('messages.card.instagram')}}</label>
                                            <input type="url" name="instagram" value="{{$card->icons->instagram}}"
                                                   placeholder="ex: https://www.instagram.com/venmeo.de"
                                                   class="form-control icon_in" data-icon="instagram">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="calendly" class="form-label">{{__('messages.card.calendly')}}</label>
                                            <input type="text" name="calendly" value="{{$card->icons->calendly}}" 
                                                placeholder="ex: {{__('messages.common.username')}}"
                                                class="form-control icon_in" data-icon="calendly">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="spotify"
                                                   class="form-label">{{__('messages.card.spotify')}}</label>
                                            <input type="url" name="spotify" value="{{$card->icons->spotify}}"
                                                   placeholder="ex: http://open.spotify.com/user/venmeo.de"
                                                   class="form-control icon_in" data-icon="spotify">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="twitch"
                                                   class="form-label">{{__('messages.card.twitch')}}</label>
                                            <input type="url" name="twitch" value="{{$card->icons->twitch}}"
                                                   placeholder="ex: https://www.twitch.com/venmeo.de"
                                                   class="form-control icon_in" data-icon="twitch">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="xing" class="form-label">{{__('messages.card.xing')}}</label>
                                            <input type="url" name="xing" value="{{$card->icons->xing}}"
                                                   placeholder="ex: https://www.xing.com/venmeo.de"
                                                   class="form-control icon_in" data-icon="xing">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="telegram"
                                                   class="form-label">{{__('messages.card.telegram')}}</label>
                                            <input type="url" name="telegram" value="{{$card->icons->telegram}}"
                                                   placeholder="ex: https://t.me/venmeo.de"
                                                   class="form-control icon_in" data-icon="telegram">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label for="paypal"
                                                   class="form-label">{{__('messages.card.paypal')}}</label>
                                            <input type="text" name="paypal" value="{{$card->icons->paypal}}"
                                                   placeholder="{{__('messages.placeholder.your_paypal')}}"
                                                   class="form-control cin preview_paypal icon_in"
                                                   data-preview="preview_paypal" data-icon="paypal">
                                        </div>
                                    </div>
                                    <p class="mt-3"><strong>{{__('messages.card.select_theme')}}</strong></p>
                                    <hr>
                                    <div class="row card_theme">
                                        <div class="col-sm-6 col-lg-4 col-xl-3">
                                            <label class="form-selectgroup-item flex-fill" for="theme1">
                                                <input class="form-input" type="radio" name="theme_id" id="theme1"
                                                       value="1" {{$card->template_id == 1 ? 'checked' : ''}}>
                                                <div class="form-selectgroup-label d-flex align-items-center">
                                                    <div>
                                                        <img src="{{asset('assets/images/theme1.png')}}"
                                                             class="img-fluid" alt="theme">
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="col-sm-6 col-lg-4 col-xl-3">
                                            <label class="form-selectgroup-item flex-fill" for="theme2">
                                                <input class="form-input" type="radio" name="theme_id" id="theme2"
                                                       value="2" {{$card->template_id == 2 ? 'checked' : ''}}>
                                                <div class="form-selectgroup-label d-flex align-items-center">
                                                    <div>
                                                        <img src="{{asset('assets/images/theme2.png')}}"
                                                             class="img-fluid" alt="theme">
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center mt-4 mb-2">
                                        <button type="submit"
                                                class="btn btn-success btn-sm">{{__('messages.card.save_card')}}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="">
                            <div class="p-0 template-preview">
                                @if($card->template_id == '1')
                                    @include('user.card.template.template1', compact('card'))
                                @elseif($card->template_id == '2')
                                    @include('user.card.template.template2', compact('card'))
                                @endif
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    {{-- profile image upload modal --}}
    <div id="uploadimageModal" class="modal" role="dialog" data-keyboard="false" data-backdrop="static"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered img-crop-modal">
            <div class="modal-content">
                <div class="modal-body img-crop-modal-body">
                    <div id="image_demo" style="margin-top:30px"></div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success crop_image">

                        <span class="btn-txt">{{ __('Crop & Upload Image') }}</span>
                    </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('Close')}}</button>
                </div>
            </div>
        </div>
    </div>
    {{-- cover image upload modal --}}
    <div id="uploadcoverModal" class="modal" role="dialog" data-keyboard="false" data-backdrop="static"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered img-crop-modal">
            <div class="modal-content">
                <div class="modal-body img-crop-modal-body">
                    <div id="cover_demo" style="margin-top:30px"></div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success crop_cover">

                        <span class="btn-txt">{{ __('Crop & Upload Cover Image') }}</span>
                    </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('Close')}}</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('assets/js/card.js') }}?v=1.0.3"></script>
    <script>
        $(document).ready(function () {
            $('input[name="theme_id"]').on('change', function () {
                var selectedTheme = $(this).val();
                var cardId = $('#card_id').val();

                $.ajax({
                    url: '{{ route("admin.card.preview.template") }}',
                    type: 'GET',
                    data: {
                        template_id: selectedTheme,
                        card_id: cardId
                    },
                    success: function (response) {

                        $('.template-preview').html(response);

                        $('.cin').each(function () {
                            var cin = $(this).val();
                            var preview = $(this).data('preview');
                            var concat_cls = $(this).data('concat');

                            if (concat_cls !== undefined) {
                                cin = '';
                                $('.' + concat_cls).each(function () {
                                    cin += ' ' + $(this).val();
                                });
                                cin = cin.trim();
                            }

                            document.querySelectorAll('#' + preview).forEach(function (element) {
                                element.innerHTML = cin;
                            });
                        });

                        $('.icon-wrapper').hide();

                        $('.icon_in').each(function () {
                            var inputField = $(this);
                            var iconType = inputField.data('icon');
                            var inputValue = inputField.val().trim();

                            if (inputValue) {
                                $('.icon-wrapper[data-icon="' + iconType + '"]').show();
                            } else {
                                $('.icon-wrapper[data-icon="' + iconType + '"]').hide();
                            }
                        });

                    },
                    error: function (xhr) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
    <script src="{{ asset('assets/js/croppie.js') }}?v=1.0.3"></script>
    @include('user.card.image_crop')
@endpush
