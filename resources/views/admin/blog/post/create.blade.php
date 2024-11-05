@extends('admin.layouts.master')
@push('style')
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
@endpush
@section('blogDropdown', 'menu-open')
@section('blockDropdownMenu', 'd-block')
@section('post_create', 'active')
@section('title') {{ $data['title'] ?? '' }} @endsection
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
                            <li class="breadcrumb-item"><a href="">Manage Post</a></li>
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
                                            <a href="{{ route('admin.blog-post.index') }}" class="btn btn-primary btn-sm">Back</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body table-responsive p-4">
                                <form action="{{ route('admin.blog-post.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="image" class="form-lable">Featured Image
                                                    <br><small class="text-info fw-bold"><strong>({{__('messages.settings_home_content.recommended_size')}} 150x150px)</strong></small>
                                                </label>
                                                <input type="file" name="image" id="image" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="title" class="form-lable">Post Title</label>
                                                <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control" placeholder="Enter your post title"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="title" class="form-lable">Tags</label>
                                                <input type="text" name="tags[]" id="tags"
                                                    class="form-control tags" data-role="tagsinput" required="required" placeholder="Tags">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="category" class="form-lable">Category</label>
                                                <select name="category_id" id="category_id" class="form-control" required="required">
                                                    <option value="" class="d-none">-- Select Category --</option>
                                                    @foreach ($data['bog_category'] as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="status" class="form-lable">Published Status</label>
                                                <select name="status" id="status" class="form-control">
                                                    <option value="1">Published</option>
                                                    <option value="0">Unpublished</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="status" class="form-lable">Description</label>
                                                <textarea name="details" id="summernote" class="summernote" cols="30" rows="5" class="form-control">{{ old('description') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success">Add post</button>
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
