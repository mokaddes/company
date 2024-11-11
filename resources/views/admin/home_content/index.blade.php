@extends('admin.layouts.master')


@section('settings_menu', 'menu-open')
@section('home', 'active')

@section('title')
    {{ $data['title'] ?? '' }}
@endsection

@push('style')
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('assets/js-uploader/jquery.uploader.css') }}">
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
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
                            <li class="breadcrumb-item"><a
                                    href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
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
                                                <h3 class="card-title">Banner Section</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <video width="50%" height="100" controls>
                                                            <source
                                                                src="{{ asset($home->image ?? 'assets/default.png')}}"
                                                                type="video/mp4">
                                                            Your browser does not support the video tag.
                                                        </video>
                                                        <div class="mb-3">
                                                            <label class="form-label">Banner Video</label>
                                                            <input type="file" class="form-control" name="image"
                                                                   placeholder="{{ __('Banner image') }}..."
                                                                   accept="video/*"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- About Section --}}
                                    <div>
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">About Section</h3>
                                            </div>
                                            <div class="card-body">
                                                <div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label
                                                                class="form-label required">About Title</label>
                                                            <input type="text" class="form-control" name="about_title"
                                                                   value="{{$home->about_title ?? ''}}"
                                                                   placeholder="Enter about title..." required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label
                                                                class="form-label required">About button text</label>
                                                            <input type="text" class="form-control"
                                                                   name="about_btn_text"
                                                                   value="{{$home->about_btn_text ?? ''}}"
                                                                   placeholder="About button text" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label
                                                                class="form-label required">About Description</label>
                                                            <textarea class="form-control summernote"
                                                                      name="about_description" rows="3"
                                                                      placeholder="Enter about description"
                                                                      style="height: 100px !important;"
                                                                      required>{{$home->about_description ?? ''}}</textarea>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- client Section --}}

                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title required">Client Section</h3>
                                        </div>
                                        <div class="card-body">
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label required">Client Title</label>
                                                        <input type="text" class="form-control" name="client_title"
                                                               value="{{$home->client_title ?? ''}}"
                                                               placeholder="Enter client title..." required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <input class="demo3" id="demo3" name="file[]" type="text" value="" accept=".pdf, .doc, .docx, image/*">
                                                    <input type="hidden" id="fileData" name="fileData">
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
    <script src="{{ asset('assets/js-uploader/jquery.uploader.min.js') }}"></script>

    <script type="application/javascript">
        let ajaxConfig = {
            ajaxRequester: function (config, uploadFile, pCall, sCall, eCall) {
                let progress = 0
                let interval = setInterval(() => {
                    progress += 10;
                    pCall(progress)
                    if (progress >= 100) {
                        clearInterval(interval)
                        const windowURL = window.URL || window.webkitURL;
                        sCall({
                            data: windowURL.createObjectURL(uploadFile.file)
                        })
                        // eCall("上传异常")
                    }
                }, 300);
            }
        }

        $("#demo3").uploader({
            multiple: true,
            autoUpload:false,
            ajaxConfig: ajaxConfig
        }).on("file-remove",function() {
            alert("file-remove")
        }).on("file-add", function(event, files) {
            // For each file added, append it to the hidden input field
            console.log(files);
            let fileInput = $('#fileData');
            let existingFiles = fileInput.val() ? JSON.parse(fileInput.val()) : [];

            files.forEach(file => {
                // Create an object with file metadata
                existingFiles.push({
                    name: file.name,
                    size: file.size,
                    type: file.type
                });
            });

            // Update hidden input with new files' data
            fileInput.val(JSON.stringify(existingFiles));
        });

    </script>
    <script>
        const form = document.getElementById("settingUpdate");
        const submitButton = form.querySelector("button[type='submit']");

        form.addEventListener("submit", function () {

            $("#updateButton").html(`
                <span id="">
                    <span class="spinner-border spinner-border-sm text-white" role="status" aria-hidden="true"></span>
                    Updating Setting...
                </span>
            `);

            submitButton.disabled = true;

        });

       /* let preloaded = [
            {id: 1, src: 'https://picsum.photos/500/500?random=1'},
            {id: 2, src: 'https://picsum.photos/500/500?random=2'},
            {id: 3, src: 'https://picsum.photos/500/500?random=3'},
            {id: 4, src: 'https://picsum.photos/500/500?random=4'},
            {id: 5, src: 'https://picsum.photos/500/500?random=5'},
            {id: 6, src: 'https://picsum.photos/500/500?random=6'},
        ];

        $('.input-images-2').imageUploader({
            preloaded: preloaded,
            imagesInputName: 'photos',
            preloadedInputName: 'old',
            maxSize: 2 * 1024 * 1024,
            maxFiles: 10
        });*/
    </script>
@endpush
