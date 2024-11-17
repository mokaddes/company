@extends('admin.layouts.master')


@section('settings_menu', 'menu-open')
@section('general', 'active')

@section('title') {{ $title ?? '' }} @endsection

@push('style')
@endpush

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $title ?? 'Page Header' }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('messages.nav.dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item active">{{ __('messages.common.settings') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
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
                        <form action="{{ route('admin.settings.general_store') }}" method="post"
                            enctype="multipart/form-data" id="settingUpdate">
                            @csrf
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="m-0">{{ __('messages.common.settings') }}</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">{{__('messages.settings.site_settings')}}</h3>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-6 imgDiv">
                                                            <img src="{{ getLogo($settings->site_logo) }}" height="50px" />
                                                            <div class="mb-3">
                                                                <label class="form-label">{{ __('messages.settings.site_logo') }}
                                                                    <br><small class="text-info fw-bold"><strong>(Recommended Size 180x60px)</strong></small>
                                                                </label>
                                                                <input type="file" class="form-control" name="site_logo"
                                                                    placeholder="{{ __('Site Logo') }}..."
                                                                    accept=".png,.jpg,.jpeg,.gif,.svg" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 imgDiv">
                                                            <img src="{{ getIcon($settings->favicon) }}"
                                                                 height="50px" />
                                                            <div class="mb-3">
                                                                <label class="form-label">Favicon
                                                                    <br><small class="text-info fw-bold"><strong>(Recommended Size 200x200px)</strong></small>
                                                                </label>
                                                                <input type="file" class="form-control" name="favicon"
                                                                       placeholder="{{ __('messages.settings.favicon') }}..."
                                                                       accept=".png,.jpg,.jpeg,.gif,.svg" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 imgDiv">
                                                            <img src="{{ getPhoto($settings->footer_image) }}"
                                                                 height="50px" />
                                                            <div class="mb-3">
                                                                <label class="form-label">Footer Image
                                                                    <br><small class="text-info fw-bold"><strong>(Recommended Size 200x200px)</strong></small>
                                                                </label>
                                                                <input type="file" class="form-control" name="footer_image"
                                                                       accept=".png,.jpg,.jpeg,.gif,.svg" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 imgDiv">
                                                            <img src="{{ getPhoto($settings->seo_image) }}"
                                                                height="50px" />

                                                            <div class="mb-3">
                                                                <label class="form-label">SEO Image
                                                                    <br><small class="text-info fw-bold"><strong>(Recommended Size 728x680px)</strong></small>
                                                                </label>
                                                                <input type="file" class="form-control" name="seo_image"
                                                                    placeholder="{{ __('messages.settings.seo_image') }}..."
                                                                    accept=".png,.jpg,.jpeg,.gif,.svg" />
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label
                                                                    class="form-label required">{{ __('messages.settings.site_name') }}</label>
                                                                <input type="text" class="form-control" name="site_name"
                                                                    value="{{ $settings->site_name }}"
                                                                    placeholder="{{ __('messages.settings.site_name') }}..." required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label
                                                                    class="form-label required">App Mode</label>
                                                                <select class="form-control" name="app_mode" required>
                                                                    <option value="local" {{ $settings->app_mode == 'local' ? 'selected' : '' }}>Local</option>
                                                                    <option value="live" {{ $settings->app_mode == 'live' ? 'selected' : '' }}>Live</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="mb-3">
                                                                <label
                                                                    class="form-label required">Copyright Text</label>
                                                                <input type="text" class="form-control" name="copyright_text"
                                                                    value="{{ $settings->copyright_text }}"
                                                                    placeholder="Copyright text" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="mb-3">
                                                                <label
                                                                    class="form-label required">{{ __('messages.settings.seo_meta_description') }}</label>
                                                                <textarea class="form-control" name="seo_meta_desc" rows="3" placeholder="{{ __('messages.settings.seo_meta_description') }}"
                                                                    style="height: 120px !important;" required>{{ $settings->seo_meta_description }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="mb-3">
                                                                <label class="form-label">{{ __('messages.settings.seo_keywords') }}</label>
                                                                <textarea class="form-control required" name="meta_keywords" rows="3"
                                                                    placeholder="{{ __('SEO Keywords (Keyword 1, Keyword 2)') }}" style="height: 120px !important;" required>{{ $settings->seo_keywords }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>




                                        {{-- General Settings --}}
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">Contact Settings</h3>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-6 imgDiv">
                                                            <img src="{{ getPhoto($settings->contact_image) }}"
                                                                 height="50px" />
                                                            <div class="mb-3">
                                                                <label class="form-label">Contact Image
                                                                    <br><small class="text-info fw-bold"><strong>(Recommended Size 728x680px)</strong></small>
                                                                </label>
                                                                <input type="file" class="form-control" name="contact_image"
                                                                       placeholder="Contact Image"
                                                                       accept=".png,.jpg,.jpeg,.gif,.svg" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 d-none d-lg-block">

                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">Contact Title</label>
                                                                <input type="text" name="contact_title" class="form-control"
                                                                    value="{{ old('contact_title', $settings->contact_title) }}">
                                                                @error('contact_title')
                                                                    <span
                                                                        class="help-block text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">Contact Subtitle</label>
                                                                <input type="text" name="contact_subtitle" class="form-control"
                                                                    value="{{ old('contact_subtitle', $settings->contact_subtitle) }}">
                                                                @error('contact_subtitle')
                                                                    <span
                                                                        class="help-block text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">Contact Form Title</label>
                                                                <input type="text" name="contact_form_title" class="form-control"
                                                                    value="{{ old('contact_form_title', $settings->contact_form_title) }}">
                                                                @error('contact_form_title')
                                                                    <span
                                                                        class="help-block text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">{{ __('messages.common.email') }}</label>
                                                                <input type="email" name="email" class="form-control"
                                                                    value="{{ $settings->email }}">
                                                                @error('email')
                                                                    <span
                                                                        class="help-block text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">{{ __('messages.settings.phone_no') }}</label>
                                                                <input type="phone_no" name="phone_no"
                                                                    class="form-control"
                                                                    value="{{ $settings->phone_no }}">
                                                                @error('phone_no')
                                                                    <span
                                                                        class="help-block text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="mb-3">
                                                                <label class="form-label">Address</label>
                                                                <textarea class="form-control" name="office_address" rows="3" placeholder="{{ __('messages.settings.office_address') }}"
                                                                    style="height: 120px !important;" required>{{ $settings->office_address }}</textarea>

                                                                @error('office_address')<span
                                                                        class="help-block text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <button type="submit" class="btn btn-success"
                                                id="updateButton">{{__('messages.common.update')}}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
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
        // preview image

        function readURL(input, img) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    img.attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(".imgDiv input").change(function() {
            let img = $(this).closest('.imgDiv').find('img');
            readURL(this, img);
        });

    </script>
@endpush
