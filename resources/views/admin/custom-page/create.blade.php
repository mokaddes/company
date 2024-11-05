@extends('admin.layouts.master')
@section('cpage', 'active')
@section('title') {{ $data['title'] ?? '' }} @endsection
@push('style')
    <style>
        .hr-text {
            display: flex;
            align-items: center;
            margin: 2rem 0;
            font-size: .825rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: .04em;
            line-height: 1rem;
            color: #6c7a91;
            height: 1px;
        }
        .hr-text:before {
            content: "";
            margin-right: .5rem;
        }
        .hr-text:after, .hr-text:before {
            flex: 1 1 auto;
            height: 1px;
            background-color: #dce1e7;
        }
        .hr-text:after {
            content: "";
            margin-left: .5rem;
        }
    </style>
@endpush
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Custome Page Create</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">Custome Page Create</li>
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
                                        <h3 class="card-title"> Custome Page Create</h3>
                                    </div>
                                    <div class="col-6">
                                        <div class="float-right">
                                            <a href="{{ route('admin.cpage.index') }}" class="btn btn-primary btn-gradient btn-sm">Back</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body table-responsive p-4">
                                <form action="{{ route('admin.cpage.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="title" class="form-lable">Page Name</label>
                                                <input type="text" name="title" id="title" placeholder="Page Name"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="slug" class="form-lable">Page Slug</label>
                                                <input type="text" name="slug" id="slug" readonly
                                                    placeholder="Page Slug" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
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
                                                <textarea name="body" cols="30" rows="5" class="form-control summernote"></textarea>
                                            </div>
                                        </div>
                                        <div class="hr-text col-lg-12">Meta Information</div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="meta_title" class="form-lable">Meta Title 
                                                    <span class="ml-2 text-info">( Recommend length, around 60 characters )</span>
                                                </label>
                                                <input type="text" name="meta_title" id="meta_title" placeholder="Meta Title"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="meta_keywords" class="form-lable">Meta Keywords</label>
                                                <input type="text" name="meta_keywords" id="meta_keywords" placeholder="Meta Keywords"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="meta_description" class="form-lable">Meta Description 
                                                    <span class="ml-2 text-info">( Recommend length, around 160 characters )</span>
                                                </label>
                                                <textarea name="meta_description" cols="30" rows="5" id="meta_description" 
                                                    class="form-control" placeholder="Meta Description"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success">Add Page</button>
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
    <script>
        // slug generator
        $(document).on('input','#title', function(){
            let titleValue = event.target.value;
            let slug = titleValue.toLowerCase()
                .replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ')
                .replace(/^\s+|\s+$/gm, '')
                .replace(/\s+/g, '-');
            $('#slug').val(slug);
        })
    </script>

@endpush
