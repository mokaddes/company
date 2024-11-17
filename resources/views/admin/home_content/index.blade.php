@extends('admin.layouts.master')


@section('settings_menu', 'menu-open')
@section('home', 'active')

@section('title')
    {{ $data['title'] ?? '' }}
@endsection

@push('style')
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

    <style>
        .image-upload-container {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            align-items: center;
        }

        .uploaded-images {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .uploaded-image-wrapper {
            position: relative;
            width: 100px;
            height: 100px;
            margin-bottom: 10px;
        }

        .uploaded-image-wrapper img {
            width: 100%;
            height: 100%;
            border: 2px solid #f0a500;
            border-radius: 5px;
        }

        .previous-image {
            gap: 10px;
        }

        .previous-image .uploaded-image-wrapper img {
            border: 2px solid #abadac !important;
        }

        .uploaded-image-wrapper .delete-button {
            position: absolute;
            top: 5px;
            right: 5px;
            background-color: red;
            color: white;
            border: none;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 14px;
            cursor: pointer;
            display: none;
        }

        .uploaded-image-wrapper:hover .delete-button {
            display: block;
        }

        .upload-box {
            width: 100px;
            height: 100px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border: 2px dashed #ccc;
            cursor: pointer;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .upload-box span {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        .update-button {
            background-color: #28a745;
            color: #fff;
            padding: 8px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }





    </style>
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
                                    {{-- Banner Section --}}

                                    <div class="card">
                                        <div class="card-header ">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h3 class="card-title">Banner Section</h3>
                                                <!-- Toggle Switch -->
                                                <input type="checkbox" class="toggle_switch" name="banner" {{ $home->banner_section == 1 ? 'checked' : '' }} value="1" data-toggle="toggle" data-on="Show" data-off="Hide">
                                            </div>
                                        </div>
                                        <div class="card-body" style="display: {{ $home->banner_section == 1 ? '' : 'none' }}">
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
                                    {{-- About Section --}}
                                    <div class="card">
                                        <div class="card-header">

                                            <div class="d-flex justify-content-between align-items-center">
                                                <h3 class="card-title">Welcome Section</h3>
                                                <!-- Toggle Switch -->
                                                <input type="checkbox" class="toggle_switch" name="about" {{ $home->about_section == 1 ? 'checked' : '' }} value="1" data-toggle="toggle" data-on="Show" data-off="Hide">
                                            </div>
                                        </div>
                                        <div class="card-body" style="display: {{ $home->about_section == 1 ? '' : 'none' }}">
                                            <div>
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label required">Welcome Title</label>
                                                        <input type="text" class="form-control" name="about_title"
                                                               value="{{$home->about_title ?? ''}}"
                                                               placeholder="Enter welcome title..." required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label required">Welcome button text</label>
                                                        <input type="text" class="form-control"
                                                               name="about_btn_text"
                                                               value="{{$home->about_btn_text ?? ''}}"
                                                               placeholder="Welcome button text" required>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label
                                                            class="form-label required">Welcome Description</label>
                                                        <textarea class="form-control "
                                                                  name="about_description" rows="3"
                                                                  placeholder="Enter welcome description"
                                                                  style="height: 100px !important;"
                                                                  required>{{$home->about_description ?? ''}}</textarea>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    {{-- client Section --}}
                                    <div class="card">
                                        <div class="card-header">

                                            <div class="d-flex justify-content-between align-items-center">
                                                <h3 class="card-title required">Client Section</h3>
                                                <!-- Toggle Switch -->
                                                <input type="checkbox" name="client" class="toggle_switch" {{ $home->client_section == 1 ? 'checked' : '' }} value="1" data-toggle="toggle" data-on="Show" data-off="Hide">
                                            </div>
                                        </div>
                                        <div class="card-body" style="display: {{ $home->client_section == 1 ? '' : 'none' }} ">
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
                                                <div class="mb-3">
                                                    <label class="form-label required">Client Images</label>
                                                    <div class="previous-image mb-4 d-flex flex-wrap">
                                                        @foreach($client_images as $client_image)
                                                            <div class="uploaded-image-wrapper">
                                                                <img src="{{ asset($client_image->image) }}"
                                                                     alt="Uploaded Image">
                                                                <a href="{{ route('admin.settings.clientImage.delete', $client_image->id) }}"
                                                                   class="delete-button deleteData text-center">
                                                                    <i class="fa fa-trash"></i>
                                                                </a>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="image-upload-container">
                                                        <div class="uploaded-images justify-content-between"
                                                             id="uploadedImagesContainer">
                                                            <!-- Images with delete buttons will be appended here dynamically -->
                                                        </div>
                                                        <div class="upload-box" onclick="triggerFileInput('fileInput')">
                                                            <span>+</span>
                                                            <p>Upload</p>
                                                        </div>

                                                        <!-- Hidden file input for image upload -->
                                                        <input type="file" id="fileInput" name="client_images[]"
                                                               style="display: none;" accept="image/*"
                                                               onchange="handleFileUpload(event, 'uploadedImagesContainer')"
                                                               multiple/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Contact Section --}}
                                    <div class="card">
                                        <div class="card-header">

                                            <div class="d-flex justify-content-between align-items-center">
                                                <h3 class="card-title">Contact Section</h3>
                                                <!-- Toggle Switch -->
                                                <input type="checkbox" name="contact" class="toggle_switch" {{ $home->contact_section == 1 ? 'checked' : '' }}  value="1" data-toggle="toggle" data-on="Show" data-off="Hide">
                                            </div>
                                        </div>
                                        <div class="card-body" style="display: {{ $home->contact_section == 1 ? '' : 'none' }}">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label required">Contact Title</label>
                                                    <input type="text" class="form-control" name="contact_title"
                                                           value="{{$home->contact_title ?? ''}}"
                                                           placeholder="Enter contact title..." required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label required">Contact SubTitle</label>
                                                    <input type="text" class="form-control" name="contact_subtitle"
                                                           value="{{$home->contact_subtitle ?? ''}}"
                                                           placeholder="Enter contact subtitle..." required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label required">Contact Details</label>
                                                    <input type="text" class="form-control" name="contact_description"
                                                           value="{{$home->contact_description ?? ''}}"
                                                           placeholder="Enter contact details..." required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label required">Contact Button Text</label>
                                                    <input type="text" class="form-control" name="contact_btn_text"
                                                           value="{{$home->contact_btn_text ?? ''}}"
                                                           placeholder="Enter button text..." required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label required">Contact Address Title</label>
                                                    <input type="text" class="form-control" name="contact_address_title"
                                                           value="{{$home->contact_address_title ?? ''}}"
                                                           placeholder="Enter button text..." required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- footer Section --}}
                                    {{--<div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title required">Footer Section</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label required">Footer Text</label>
                                                    <input type="text" class="form-control" name="footer_title"
                                                           value="{{$home->footer_text ?? ''}}"
                                                           placeholder="Enter footer text..." required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label required">Footer Image</label>
                                                    <div class="image-upload-container">
                                                        <div class="uploaded-images" id="footerImagesContainer">
                                                            @if(file_exists($home->footer_image))
                                                                <div class="uploaded-image-wrapper">
                                                                    <img src="{{ asset($home->footer_image) }}"
                                                                         alt="Footer Image">
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="upload-box"
                                                             onclick="triggerFileInput('footerInput')">
                                                            <span>+</span>
                                                            <p>Upload</p>
                                                        </div>

                                                        <!-- Hidden file input for image upload -->
                                                        <input type="file" id="footerInput" name="footer_image"
                                                               style="display: none;" accept="image/*"
                                                               onchange="handleFileUpload(event, 'footerImagesContainer')"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>--}}

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
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
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


        function triggerFileInput(inputId) {
            document.getElementById(inputId).click();
        }

        let uploadedImages = [];

        const fileInput = document.getElementById("fileInput");

        function handleFileUpload(event, containerId) {
            const files = event.target.files;
            const uploadedImagesContainer = document.getElementById(containerId);
            uploadedImagesContainer.innerHTML = ""; // Clear existing images

            // Loop through selected files
            for (let i = 0; i < files.length; i++) {
                const file = files[i];

                // Check if the file is an image
                if (!file.type.startsWith("image/")) {
                    alert("Only image files are allowed!");
                    continue;
                }

                const reader = new FileReader();

                reader.onload = function (e) {
                    // Create a wrapper div for each uploaded image and delete button
                    const imageWrapper = document.createElement("div");
                    imageWrapper.className = "uploaded-image-wrapper";

                    // Create an image element
                    const img = document.createElement("img");
                    img.src = e.target.result;
                    img.alt = "Uploaded Image";

                    // Create a delete button
                    const deleteButton = document.createElement("button");
                    deleteButton.className = "delete-button";
                    deleteButton.textContent = "×";
                    deleteButton.onclick = function () {
                        uploadedImagesContainer.removeChild(imageWrapper);
                        uploadedImages = uploadedImages.filter((image) => image !== file);
                    };

                    // Append image and delete button to wrapper, and wrapper to container
                    imageWrapper.appendChild(img);
                    // imageWrapper.appendChild(deleteButton);
                    uploadedImagesContainer.appendChild(imageWrapper);
                };


                reader.readAsDataURL(file);
            }
        }

        // Toggle Switch
        $(document).on('change', '.toggle_switch', function () {
            let status = $(this).prop('checked') == true ? 1 : 0;
            let body = $(this).closest('.card').find('.card-body');
            if (status === 1) {
                body.fadeIn();
            } else {
                body.fadeOut();
            }
        });


    </script>
@endpush
