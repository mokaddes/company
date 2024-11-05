@extends('admin.layouts.master')


@section('settings_menu', 'menu-open')
@section('general', 'active')

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
                                                        <div class="col-lg-6">
                                                            <img src="{{ getLogo($settings->site_logo) }}" height="50px" />
                                                            <div class="mb-3">
                                                                <label class="form-label">{{ __('messages.settings.site_logo') }} 
                                                                    <br><small class="text-info fw-bold"><strong>({{__('messages.settings_home_content.recommended_size')}} 180x60px)</strong></small>
                                                                </label>
                                                                <input type="file" class="form-control" name="site_logo"
                                                                    placeholder="{{ __('Site Logo') }}..."
                                                                    accept=".png,.jpg,.jpeg,.gif,.svg" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">

                                                            <img src="{{ getSeoImage($settings->seo_image) }}"
                                                                height="50px" />

                                                            <div class="mb-3">
                                                                <label class="form-label">{{ __('messages.settings.seo_image') }} 
                                                                    <br><small class="text-info fw-bold"><strong>({{__('messages.settings_home_content.recommended_size')}} 728x680px)</strong></small>
                                                                </label>
                                                                <input type="file" class="form-control" name="seo_image"
                                                                    placeholder="{{ __('messages.settings.seo_image') }}..."
                                                                    accept=".png,.jpg,.jpeg,.gif,.svg" />
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            @if ($settings->favicon)
                                                                <img src="{{ getIcon($settings->favicon) }}"
                                                                    height="50px" />
                                                            @endif
                                                            <div class="mb-3">
                                                                <label class="form-label">{{ __('messages.settings.favicon') }} 
                                                                    <br><small class="text-info fw-bold"><strong>({{__('messages.settings_home_content.recommended_size')}} 200x200px)</strong></small>
                                                                </label>
                                                                <input type="file" class="form-control" name="favicon"
                                                                    placeholder="{{ __('messages.settings.favicon') }}..."
                                                                    accept=".png,.jpg,.jpeg,.gif,.svg" />
                                                            </div>
                                                        </div>
                                                   
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">{{ __('messages.settings.app_name') }}</label>
                                                                <input type="text" class="form-control" name="app_name"
                                                                    value="{{ config('app.name') }}"
                                                                    placeholder="{{ __('messages.settings.app_name') }}..." readonly>
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
                                                        {{-- <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label
                                                                    class="form-label required">{{ __('messages.settings.site_title') }}</label>
                                                                <input type="text" class="form-control"
                                                                    name="site_name" value="{{ $settings->site_name }}"
                                                                    placeholder="{{ __('messages.settings.site_title') }}..." required>
                                                            </div>
                                                        </div> --}}
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
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label
                                                                    class="form-label required">{{ __('messages.settings.invoice_footer') }}</label>
                                                                <input type="text" class="form-control"
                                                                    name="invoice_footer" value="{{ $settings->invoice_footer }}"
                                                                    placeholder="{{ __('messages.settings.invoice_footer') }}..." required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label
                                                                    class="form-label required">{{ __('messages.settings.invoice_footer') }} (ger)</label>
                                                                <input type="text" class="form-control"
                                                                    name="invoice_footer_de" value="{{ $settings->invoice_footer_de }}"
                                                                    placeholder="{{ __('messages.settings.invoice_footer') }}..." required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label
                                                                    class="form-label required">{{ __('messages.settings.tax') }}</label>
                                                                <input type="number" step="0.01" min="0" class="form-control"
                                                                    name="tax" value="{{ $settings->tax }}"
                                                                    placeholder="{{ __('messages.settings.tax') }}..." required>
                                                            </div>
                                                        </div>
                                                      
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        

                                        {{-- paypal setting --}}
                                        <div class="col-lg-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">{{__('messages.settings.paypal_settings')}}</h3>
                                                </div>
                                                <div class="card-body">

                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="mb-3">
                                                                <label
                                                                    class="form-label required">{{ __('messages.settings.mode') }}</label>
                                                                <select type="text" class="form-select form-control"
                                                                    placeholder="Select a payment mode"
                                                                    id="select-tags-advanced" name="paypal_mode" required>
                                                                    <option value="sandbox"
                                                                        {{ $config[3]->config_value == 'sandbox' ? 'selected' : '' }}>
                                                                        {{ __('Sandbox') }}</option>
                                                                    <option value="live"
                                                                        {{ $config[3]->config_value == 'live' ? 'selected' : '' }}>
                                                                        {{ __('Live') }}</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="mb-3">
                                                                <label
                                                                    class="form-label required">{{ __('messages.settings.client_key') }}</label>
                                                                <input type="text" class="form-control"
                                                                    name="paypal_client_key"
                                                                    value="{{ $config[4]->config_value }}"
                                                                    placeholder="{{ __('Client Key') }}..." required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="mb-3">
                                                                <label class="form-label"
                                                                    required>{{ __('messages.settings.secret') }}</label>
                                                                <input type="text" class="form-control"
                                                                    name="paypal_secret"
                                                                    value="{{ $config[5]->config_value }}"
                                                                    placeholder="{{ __('Secret') }}..." required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- strip setting --}}
                                        {{-- <div class="col-lg-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">{{__('messages.settings.stripe_settings')}}</h3>
                                                </div>
                                                <div class="card-body">

                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="mb-3">
                                                                <label
                                                                    class="form-label required">{{ __('messages.settings.mode') }}</label>
                                                                <select type="text" class="form-select form-control"
                                                                    placeholder="Select a payment mode"
                                                                    id="select-tags-advanced" name="paypal_mode" required>
                                                                    <option value="sandbox"
                                                                        {{ $config[3]->config_value == 'sandbox' ? 'selected' : '' }}>
                                                                        {{ __('Sandbox') }}</option>
                                                                    <option value="live"
                                                                        {{ $config[3]->config_value == 'live' ? 'selected' : '' }}>
                                                                        {{ __('Live') }}</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12">
                                                            <div class="mb-3">
                                                                <label
                                                                    class="form-label required">{{ __('messages.settings.publishable_key') }}</label>
                                                                <input type="text" class="form-control"
                                                                    name="stripe_publishable_key"
                                                                    value="{{ $config[9]->config_value }}"
                                                                    placeholder="{{ __('Publishable Key') }}..." required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="mb-3">
                                                                <label
                                                                    class="form-label required">{{ __('messages.settings.secret') }}</label>
                                                                <input type="text" class="form-control"
                                                                    name="stripe_secret"
                                                                    value="{{ $config[10]->config_value }}"
                                                                    placeholder="{{ __('Secret') }}..." required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}

                                        {{-- General Settings --}}
                                        <div class="col-lg-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">{{__('messages.settings.general_settings')}}</h3>
                                                </div>
                                                <div class="card-body">

                                                    <div class="row">
                                                        {{-- <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label required"
                                                                    for="timezone">{{ __('Timezone') }}</label>
                                                                <select name="timezone" id="timezone"
                                                                    class="form-control" required>
                                                                    @foreach (timezone_identifiers_list() as $timezone)
                                                                        <option value="{{ $timezone }}"
                                                                            {{ $config[2]->config_value == $timezone ? ' selected' : '' }}>
                                                                            {{ $timezone }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('timezone')
                                                                    <span
                                                                        class="help-block text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label required"
                                                                    for="currency">{{ __('Currency') }}</label>
                                                                <select name="currency" id="currency"
                                                                    class="form-control" required>
                                                                    @foreach ($currencies as $currency)
                                                                        <option value="{{ $currency->iso_code }}"
                                                                            {{ $config[1]->config_value == $currency->iso_code ? ' selected' : '' }}>
                                                                            {{ $currency->name }}
                                                                            ({{ $currency->symbol }})
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                                @error('currency')
                                                                    <span
                                                                        class="help-block text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div> --}}
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
                                                                <label class="form-label">{{ __('messages.settings.support_email') }}</label>
                                                                <input type="support_email" name="support_email"
                                                                    class="form-control"
                                                                    value="{{ $settings->support_email }}">
                                                                @error('support_email')
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
                                                                <label class="form-label">{{ __('messages.settings.office_address') }}</label>
                                                                <textarea class="form-control" name="office_address" rows="3" placeholder="{{ __('messages.settings.office_address') }}"
                                                                    style="height: 120px !important;" required>{{ $settings->office_address }}</textarea>
                                                            
                                                                @error('office_address')
                                                                    <span
                                                                        class="help-block text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12">
                                                            <div class="mb-3">
                                                                <label class="form-label">{{ __('messages.settings.map_link') }}</label>
                                                                <input type="map_link" name="map_link"
                                                                    class="form-control"
                                                                    value="{{ $settings->map_link }}">
                                                                @error('map_link')
                                                                    <span
                                                                        class="help-block text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Social --}}
                                        {{-- <div class="col-lg-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">Social URL</h3>
                                                </div>
                                                <div class="card-body">

                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label
                                                                    class="form-label">{{ __('Facebook URL') }}</label>
                                                                <input type="url" class="form-control"
                                                                    name="facebook_url"
                                                                    value="{{ $settings->facebook_url }}"
                                                                    placeholder="{{ __('Facebook URL') }}...">
                                                                @error('facebook_url')
                                                                    <span
                                                                        class="help-block text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">{{ __('Youtube Url') }}</label>
                                                                <input type="url" class="form-control"
                                                                    name="youtube_url"
                                                                    value="{{ $settings->youtube_url }}"
                                                                    placeholder="{{ __('Youtube Url') }}...">
                                                                @error('youtube_url')
                                                                    <span
                                                                        class="help-block text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">{{ __('Twitter Url') }}</label>
                                                                <input type="url" class="form-control"
                                                                    name="twitter_url"
                                                                    value="{{ $settings->twitter_url }}"
                                                                    placeholder="{{ __('Twitter Url') }}...">
                                                                @error('twitter_url')
                                                                    <span
                                                                        class="help-block text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label
                                                                    class="form-label">{{ __('Linkedin url') }}</label>
                                                                <input type="url" class="form-control"
                                                                    name="linkedin_url"
                                                                    value="{{ $settings->linkedin_url }}"
                                                                    placeholder="{{ __('Linkedin url') }}...">
                                                                @error('linkedin_url')
                                                                    <span
                                                                        class="help-block text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label
                                                                    class="form-label">{{ __('Telegram url') }}</label>
                                                                <input type="url" class="form-control"
                                                                    name="telegram_url"
                                                                    value="{{ $settings->telegram_url }}"
                                                                    placeholder="{{ __('Linkedin url') }}...">
                                                                @error('telegram_url')
                                                                    <span
                                                                        class="help-block text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>

                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label
                                                                    class="form-label">{{ __('WhatsApp Number') }}</label>
                                                                <input type="text" class="form-control"
                                                                    name="whatsapp_number"
                                                                    value="{{ $settings->whatsapp_number }}"
                                                                    placeholder="{{ __('WhatsApp Number') }}...">
                                                                @error('whatsapp_number')
                                                                    <span
                                                                        class="help-block text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                        {{-- Google Settings --}}
                                        {{-- <div class="col-lg-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">Google Login</h3>
                                                </div>
                                                <div class="card-body">

                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label
                                                                    class="form-label">{{ __('Google client id') }}</label>
                                                                <input type="text" class="form-control"
                                                                    name="google_client_id"
                                                                    value="{{ $settings->google_client_id }}"
                                                                    placeholder="{{ __('Google client id') }}...">
                                                                @error('google_client_id')
                                                                    <span
                                                                        class="help-block text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label
                                                                    class="form-label">{{ __('Google client secret') }}</label>
                                                                <input type="text" class="form-control"
                                                                    name="google_client_secret"
                                                                    value="{{ $settings->google_client_secret }}"
                                                                    placeholder="{{ __('Google client secret') }}...">
                                                                @error('google_client_secret')
                                                                    <span
                                                                        class="help-block text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                        
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
