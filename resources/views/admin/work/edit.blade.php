@extends('admin.layouts.master')
@push('style')
    <style>
        textarea.form-control{
            height: 100px !important;
        }
    </style>
@endpush
@section('work', 'active')
@section('title')
    {{ $title ?? '' }}
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $title ?? '' }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="">Manage Post</a></li>
                            <li class="breadcrumb-item active">{{ $title ?? '' }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <h3 class="card-title"> {{ $title ?? '' }}</h3>
                                    </div>
                                    <div class="col-6">
                                        <div class="float-right">
                                            <a href="{{ route('admin.work.index') }}"
                                               class="btn btn-primary btn-sm">Back</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body table-responsive p-4">
                                <form action="{{  route('admin.work.update', $work->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="row align-items-center">
                                                <div class="col-6">
                                                    <h3 class="card-title"> List Information</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <!-- Background Image -->
                                                <div class="col-12">
                                                    <img src="{{ asset($work->thumbnail) }}" alt="{{  $work->list_title }}" width="50" height="50">
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-4">
                                                        <label for="image" class="form-label">Thumbnail</label>
                                                        <input type="file" name="thumbnail" id="thumbnail" class="form-control" accept="image/*">
                                                    </div>
                                                </div>

                                                <!-- Post Title -->
                                                <div class="col-md-6">
                                                    <div class="form-group mb-4">
                                                        <label for="list_title" class="form-label">List Title</label>
                                                        <input type="text" name="list_title" id="list_title" value="{{ old('list_title', $work->list_title) }}" class="form-control" placeholder="Enter your post title" required>
                                                    </div>
                                                </div>
                                                <!-- Post Subtitle -->
                                                <div class="col-md-6">
                                                    <div class="form-group mb-4">
                                                        <label for="subtitle" class="form-label">Sub title</label>
                                                        <input type="text" name="subtitle" id="subtitle" value="{{ old('subtitle', $work->subtitle) }}" class="form-control" placeholder="Enter a subtitle" required>
                                                    </div>
                                                </div>
                                                <!-- brand name -->
                                                <div class="col-md-6">
                                                    <div class="form-group mb-4">
                                                        <label for="brand" class="form-label">Brand Name</label>
                                                        <input type="text" name="brand" id="brand" value="{{ old('brand', $work->brand) }}" class="form-control" placeholder="Enter your brand name" required>
                                                    </div>
                                                </div>
                                                <!-- Button Color -->
                                                <div class="col-md-6">
                                                    <div class="form-group mb-4">
                                                        <label for="btnColor" class="form-label">Background Color</label>
                                                        <input type="color" name="background_color" id="background_color" value="#000000" class="form-control">
                                                    </div>
                                                </div>

                                                <!-- Button Text -->
                                                <div class="col-md-6">
                                                    <div class="form-group mb-4">
                                                        <label for="button_text" class="form-label">Button Text</label>
                                                        <input type="text" name="button_text" id="button_text" value="{{ old('button_text', $work->button_text) }}" class="form-control" placeholder="Enter your button text" required>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            <div class="row align-items-center">
                                                <div class="col-6">
                                                    <h3 class="card-title"> Detail Information</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <!-- Background Image -->
                                                <div class="col-12">
                                                    <img src="{{ getPhoto($work->image) }}" alt="{{  $work->title }}" width="50" height="50">
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-4">
                                                        <label for="image" class="form-label">Work Image</label>
                                                        <input type="file" name="image" id="image" class="form-control" accept="image/*">
                                                    </div>
                                                </div>
                                                <!-- Post Title -->
                                                <div class="col-md-6">
                                                    <div class="form-group mb-4">
                                                        <label for="title" class="form-label">Work Title</label>
                                                        <input type="text" name="title" id="title" value="{{ old('title', $work->title) }}" class="form-control" placeholder="Enter your post title" required>
                                                    </div>
                                                </div>
                                                <!-- category -->
                                                <div class="col-md-6">
                                                    <div class="form-group mb-4">
                                                        <label for="category" class="form-label">Category</label>
                                                        <input type="text" name="category" id="category" value="{{ old('category', $work->category) }}" class="form-control" placeholder="Enter your category" required>
                                                    </div>
                                                </div>
                                                <!-- brief -->
                                                <div class="col-md-12">
                                                    <div class="form-group mb-4">
                                                        <label for="brief" class="form-label">Brief</label>
                                                        <textarea name="brief" id="brief" class="form-control" rows="3" placeholder="Enter work brief" >{{ old('brief', $work->brief) }}</textarea>
                                                    </div>
                                                </div>
                                                <!-- Result -->
                                                <div class="col-md-12">
                                                    <div class="form-group mb-4">
                                                        <label for="result" class="form-label">Result</label>
                                                        <textarea name="result" id="result" class="form-control" rows="3" placeholder="Enter work result" >{{ old('result', $work->result) }}</textarea>
                                                    </div>
                                                </div>
                                                <!-- Procedure -->
                                                <div class="col-md-12">
                                                    <div class="form-group mb-4">
                                                        <label for="procedure" class="form-label">Procedure</label>
                                                        <textarea name="procedures" id="procedure" class="form-control" rows="3" placeholder="Enter work procedure" >{{ old('procedures', $work->procedures) }}</textarea>
                                                    </div>
                                                </div>
                                                <!-- client quote -->
                                                <div class="col-md-12">
                                                    <div class="form-group mb-4">
                                                        <label for="client_quote" class="form-label">Client Quote</label>
                                                        <textarea name="client_quote" id="client_quote" class="form-control" rows="3" placeholder="Enter client quote" >{{ old('client_quote', $work->client_quote) }}</textarea>
                                                    </div>
                                                </div>
                                                <!-- client name -->
                                                <div class="col-md-6">
                                                    <div class="form-group mb-4">
                                                        <label for="client_name" class="form-label">Client Name</label>
                                                        <input type="text" name="client_name" id="client_name" value="{{ old('client_name', $work->client_name) }}" class="form-control" placeholder="Enter client name" >
                                                    </div>
                                                </div>
                                                <!-- status, published unpublished -->
                                                <div class="col-lg-6">
                                                    <div class="form-group mb-4">
                                                        <label for="status" class="form-label">Published Status</label>
                                                        <select name="status" id="status" class="form-control">
                                                            <option value="1" {{ $work->status == '1' ? "selected" : "" }}>Published</option>
                                                            <option value="0" {{ $work->status == '0' ? "selected" : "" }}>Unpublished</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-4">
                                                        <label for="order_number" class="form-label">Order Number</label>
                                                        <input type="text" name="order_number" id="order_number" value="{{ old('order_number', $work->order_number) }}" class="form-control" placeholder="Enter order number" >
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <!-- Meta Information -->
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="row align-items-center">
                                                <div class="col-6">
                                                    <h3 class="card-title"> Meta Information</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mb-4">
                                                        <label for="meta_title" class="form-label">Meta Title
                                                            <span class="ml-2 text-info">( Recommend length, around 60 characters )</span>
                                                        </label>
                                                        <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', $work->meta_title) }}" placeholder="Meta Title"
                                                            class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-4">
                                                        <label for="meta_keywords" class="form-label">Meta Keywords</label>
                                                        <input type="text" name="meta_keywords" id="meta_keywords" value="{{ old('meta_keywords', $work->meta_keywords) }}" placeholder="Meta Keywords"
                                                            class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group mb-4">
                                                        <label for="meta_description" class="form-label">Meta Description
                                                            <span class="ml-2 text-info">( Recommend length, around 160 characters )</span>
                                                        </label>
                                                        <textarea name="meta_description" cols="30" rows="5" id="meta_description"
                                                            class="form-control" placeholder="Meta Description">{{ old('meta_description', $work->meta_description) }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="col-12 text-right">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success">Save</button>
                                        </div>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('script')

@endpush
