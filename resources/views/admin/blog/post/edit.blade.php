@extends('admin.layouts.master')
@push('style')
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css"/>
    <style>
        .custom-img {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 5px;
            width: 100px;
            height: 90px;
        }
    </style>
@endpush
@section('blogDropdown', 'menu-open')
@section('blockDropdownMenu', 'd-block')
@section('post_create', 'active')
@section('title')
    {{ $data['title'] ?? '' }}
@endsection

@php
    $row = $data['row'];
@endphp

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $data['title'] ?? '' }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.blog-post.index') }}">Manage Post</a>
                            </li>
                            <li class="breadcrumb-item active">{{ $data['title'] ?? '' }}</li>
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
                                        <h3 class="card-title"> {{ $data['title'] ?? '' }}</h3>
                                    </div>
                                    <div class="col-6">
                                        <div class="float-right">
                                            <a href="{{ route('admin.blog-post.index') }}"
                                               class="btn btn-primary btn-sm">Back</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body table-responsive p-4">
                                <form action="{{ route('admin.blog-post.update',$row->id) }}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="image" class="form-label">Featured Image [<a class="text-bold" href="{{ getPhoto($row->image) }}" target="_blank">Previous Image</a>]<br>
                                                    <small class="text-info fw-bold"><strong>({{__('messages.settings_home_content.recommended_size')}}
                                                            600x450px)</strong></small>
                                                </label>
                                                <input type="file" name="image" id="image" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mt-0 mt-lg-3">
                                            <div class="form-group">
                                                <label for="title" class="form-label">Post Title</label>
                                                <input type="text" name="title" id="title"
                                                       value="{{ $row->title }}"
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="title" class="form-label">Tags</label>
                                                <input type="text" name="tags[]" id="tags" value="
                                                @foreach(json_decode($row->tags,true) as $key => $value)
                                                    {{ $value }}
                                                @endforeach
                                            " class="form-control tags" data-role="tagsinput" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="category" class="form-label">Category</label>
                                                <select name="category_id" id="category_id" class="form-control"
                                                        required>
                                                    <option value="" class="d-none">-- Select Category --</option>
                                                    @foreach($data['bog_category'] as $category)
                                                        <option
                                                            value="{{ $category->id }}" {{ $row->category_id == $category->id? "selected" : "" }}>{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="status" class="form-label">Published Status</label>
                                                <select name="status" id="status" class="form-control">
                                                    <option value="1" {{ $row->status == 1? "selected" : "" }}>
                                                        Published
                                                    </option>
                                                    <option value="0" {{ $row->status == 0? "selected" : "" }}>
                                                        Unpublished
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="status" class="form-label">Description</label>
                                                <textarea name="details" id="summernote" class="summernote" cols="30"
                                                          rows="5"
                                                          class="form-control">{{ $row->details }}</textarea>
                                            </div>
                                        </div>
                                        <!-- Meta Information -->
                                        <div class="col-12">
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
                                                                <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', $row->meta_title) }}" placeholder="Meta Title"
                                                                       class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group mb-4">
                                                                <label for="meta_keywords" class="form-label">Meta Keywords</label>
                                                                <input type="text" name="meta_keywords" id="meta_keywords" value="{{ old('meta_keywords', $row->meta_keywords) }}" placeholder="Meta Keywords"
                                                                       class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group mb-4">
                                                                <label for="meta_description" class="form-label">Meta Description
                                                                    <span class="ml-2 text-info">( Recommend length, around 160 characters )</span>
                                                                </label>
                                                                <textarea name="meta_description" cols="30" rows="5" id="meta_description"
                                                                          class="form-control" placeholder="Meta Description">{{ old('meta_description', $row->meta_description) }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 text-right">
                                            <button type="submit" class="btn btn-success">Update</button>
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
    <script src="{{ asset('assets/js/tagify.js') }}"></script>
    <script src="{{ asset('assets/js/tagify.polyfills.min.js') }}"></script>
<script>
       var input = document.querySelector('.tags');
        // initialize Tagify on the above input node reference
        let teg = new Tagify(input);
</script>
@endpush
