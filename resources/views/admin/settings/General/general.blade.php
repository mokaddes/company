@extends('admin.layouts.master')
@section('dashboard', 'active')

@section('title') {{ $data['title'] ?? '' }} @endsection
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h6> {{ __('basic_setting') }} </h6>
                    </div>
                    <div class="card-body">

                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="" for="site_name"> {{ __('site_name') }} </label>
                                        <input value="" name="name" type="text" class="form-control "
                                            placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3 col-md-3">
                                    <input type="file" class="form-control dropify" data-default-file=""
                                        name="logo_image" data-allowed-file-extensions='["jpg", "jpeg","png","svg"]'
                                        ccept="image/png, image/jpg,image/svg image/jpeg" data-max-file-size="3M">

                                </div>
                                <div class="col-sm-3 col-md-3">
                                    <input type="file" class="form-control dropify" data-default-file=""
                                        name="white_logo" data-allowed-file-extensions='["jpg", "jpeg","png","svg"]'
                                        ccept="image/png, image/jpg,image/svg image/jpeg" data-max-file-size="3M">

                                </div>
                                <div class="col-sm-3 col-md-3">
                                    <input type="file" class="form-control dropify" data-default-file=""
                                        name="favicon_image" data-allowed-file-extensions='["jpg", "jpeg","png","svg"]'
                                        ccept="image/png, image/jpg,image/svg image/jpeg" data-max-file-size="1M">

                                </div>
                                <div class="col-sm-3 col-md-3">
                                    <input type="file" class="form-control dropify" data-default-file=""
                                        name="loader_image" data-allowed-file-extensions='["jpg", "jpeg","png","svg"]'
                                        ccept="image/png, image/jpg,image/svg image/jpeg" data-max-file-size="1M">

                                </div>
                                <div class="row mt-3 max-auto">
                                    <button type="submit" class="btn btn-success"><i class="fas fa-sync"></i>
                                        {{ __('update') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Recaptcha Configuration
                    </div>
                    <div class="card-body">
                        <form id="recaptchaForm" class="form-horizontal" action="" method="post">
                            <div class="form-group row">
                                <div class="col-sm-7">
                                    <input value="{{ env('NOCAPTCHA_SITEKEY') }}" name="nocaptcha_key" type="text"
                                        class="form-control @error('nocaptcha_key') is-invalid @enderror"
                                        autocomplete="off">
                                    {{-- <span class="invalid-feedback" role="alert"><span>{{ $message }}</span></span> --}}
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-7">
                                        <input value="{{ env('NOCAPTCHA_SECRET') }}" name="nocaptcha_secret" type="text"
                                            class="form-control @error('nocaptcha_secret') is-invalid @enderror"
                                            autocomplete="off">
                                        {{-- <span class="invalid-feedback" role="alert"><span>{{ $message }}</span></span> --}}
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-5 col-sm-7">
                                        <button type="submit" class="btn btn-success"><i class="fas fa-sync"></i>
                                            {{ __('update') }}</button>
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

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" />
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <style>
        .custom-file-label::after {
            left: 0;
            right: auto;
            border-left-width: 0;
            border-right: inherit;
        }
    </style>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <script>
        $('.dropify').dropify();
        $("input[data-bootstrap-switch]").each(function() {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });

        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })

        $('input[name="watermark_type"]').on('switchChange.bootstrapSwitch', function(event, state) {

            var value = event.target.defaultValue;
            if (value == 'text') {
                $('#text-card').addClass('d-none');
                $('#image-card').removeClass('d-none');
                $('#imageInput').bootstrapSwitch('state', false);
            } else {
                $('#textInput').bootstrapSwitch('state', true);
                $('#text-card').removeClass('d-none');
                $('#image-card').addClass('d-none');
            }
        });
        $('input[name="watermark_status"]').on('switchChange.bootstrapSwitch', function(event, state) {
            $('#watermarkForm').submit();
        });

        $('select[name="watermark_type"]').on('change', function() {

            if ($(this).val() == 'image') {
                $('#text-div').addClass('d-none');
                $('#image-div').removeClass('d-none');
            } else {
                $('#text-div').removeClass('d-none');
                $('#image-div').addClass('d-none');
            }
        })

        $("#recaptcha_switch").on('switchChange.bootstrapSwitch', function(event, state) {
            let status = state ? 1 : 0;
            $("input[name=status]").val(status);

            $.ajax({
                type: "POST",
                dataType: "json",
                url: "",
                data: {
                    'status': status
                },
                success: function(response) {
                    setTimeout(() => {
                        window.location.reload();
                    }, 500);
                }
            });
        });
    </script>
    <script>
        $('.custom-file input').change(function(e) {
            var files = [];
            for (var i = 0; i < $(this)[0].files.length; i++) {
                files.push($(this)[0].files[i].name);
            }
            $(this).next('.custom-file-label').html(files.join(', '));
        });
    </script>
    <script src="{{ asset('backend') }}/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
@endsection
