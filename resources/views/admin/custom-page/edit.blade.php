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
                            <li class="breadcrumb-item"><a href="{{ route('admin.cpage.index') }}">{{__('messages.common.manage')}}
                                    {{ $data['title'] ?? '' }}</a>
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
                                            <a href="{{ route('admin.cpage.index') }}" class="btn btn-primary btn-gradient btn-sm">{{__('messages.common.back')}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body table-responsive p-4">
                                <form action="{{ route('admin.cpage.update', $row->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="title" class="form-label">{{__('messages.seo.page_name')}}</label>
                                                <input type="text" name="title" id="title" class="form-control"
                                                    required value="{{ $row->title }}" placeholder="{{__('messages.seo.page_name')}}">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="slug" class="form-label">{{__('messages.seo.page_slug')}}</label>
                                                <input type="text" name="slug" id="slug" readonly placeholder="Page Slug"
                                                    class="form-control" required value="{{ $row->url_slug }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="status" class="form-label">{{__('messages.crud.published_status')}}</label>
                                                <select name="status" id="status" class="form-control" @if($row->is_editable == 0) disabled @endif>
                                                    <option value="1" {{ $row->is_active == 1 ? 'selected' : '' }}>
                                                        {{__('messages.common.published')}}</option>
                                                    <option value="0" {{ $row->is_active == 0 ? 'selected' : '' }}>
                                                        {{__('messages.common.unpublished')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        @if($row->url_slug == "about-us")
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="content_1" class="form-label">{{__('messages.custom_page.first_content')}} (en)</label>
                                                    <textarea name="content_1" cols="30" rows="5" class="form-control summernote"
                                                            id="content_1">{!! $row->content_1 !!}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="content_1_de" class="form-label">{{__('messages.custom_page.first_content')}} (de)</label>
                                                    <textarea name="content_1_de" cols="30" rows="5" class="form-control summernote"
                                                            id="content_1_de">{!! $row->content_1_de !!}</textarea>
                                                </div>
                                            </div>
                                            @if(!empty($row->image_1))
                                                <img src="{{ asset($row->image_1) }}" width="150" height="150" alt="{{__('messages.custom_page.first_image')}}" class="my-2 mx-3">
                                            @endif
                                            <div class="col-12 mb-3">
                                                <label for="content1" class="form-label">{{__('messages.custom_page.first_image')}}
                                                    <br><small class="text-info fw-bold"><strong>({{__('messages.settings_home_content.recommended_size')}} 450X450px)</strong></small>
                                                </label>
                                                <input type="file" class="form-control" name="image_1" accept=".png,.jpg,.jpeg,.webp" />
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="content_2" class="form-label">{{__('messages.custom_page.second_content')}} (en)</label>
                                                    <textarea name="content_2" cols="30" rows="5" class="form-control summernote"
                                                            id="content_2">{!! $row->content_2 !!}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="content_2_de" class="form-label">{{__('messages.custom_page.second_content')}} (de)</label>
                                                    <textarea name="content_2_de" cols="30" rows="5" class="form-control summernote"
                                                            id="content_2_de">{!! $row->content_2_de !!}</textarea>
                                                </div>
                                            </div>
                                            @if(!empty($row->image_2))
                                                <img src="{{ asset($row->image_2) }}" width="150" height="150" alt="{{__('messages.custom_page.second_image')}}" class="my-2 mx-3">
                                            @endif
                                            <div class="col-12">
                                                <label for="content1" class="form-label">{{__('messages.custom_page.second_image')}}
                                                    <br><small class="text-info fw-bold"><strong>({{__('messages.settings_home_content.recommended_size')}} 450X450px)</strong></small>
                                                </label>
                                                <input type="file" class="form-control" name="image_2" accept=".png,.jpg,.jpeg,.webp" />
                                            </div>
                                        @else
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="status" class="form-label">{{__('messages.common.description')}} (en) <span class="text-danger">*</span></label>
                                                    <textarea name="body" cols="30" rows="5" class="form-control summernote">{!! $row->body !!}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="status" class="form-label">{{__('messages.common.description')}} (de) <span class="text-danger">*</span></label>
                                                    <textarea name="body_de" cols="30" rows="5" class="form-control summernote">{!! $row->body_de !!}</textarea>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="hr-text col-lg-12">{{__('messages.custom_page.meta_info')}}</div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="meta_title" class="form-label">{{__('messages.seo.meta_title')}}
                                                    <span class="ml-2 text-info">( {{__('messages.seo.meta_title_recommend')}} )</span>
                                                </label>
                                                <input type="text" name="meta_title" id="meta_title" placeholder="{{__('messages.seo.meta_title')}}"
                                                    class="form-control" value="{{ $row->meta_title }}" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="meta_keywords" class="form-label">{{__('messages.seo.meta_keywords')}}</label>
                                                <input type="text" name="meta_keywords" id="meta_keywords" placeholder="{{__('messages.seo.meta_keywords')}}"
                                                    class="form-control" value="{{ $row->meta_keywords }}" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="meta_description" class="form-label">{{__('messages.seo.meta_desc')}}
                                                    <span class="ml-2 text-info">( {{__('messages.seo.meta_description_recommend')}} )</span>
                                                </label>
                                                <textarea name="meta_description" cols="30" rows="5" id="meta_description"
                                                    class="form-control" placeholder="{{__('messages.seo.meta_desc')}}">{{$row->meta_description}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success">{{__('messages.common.update')}}</button>
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
