@extends('admin.layouts.master')

@section('testimonial', 'active')
@section('title') {{ $title ?? '' }} @endsection

@push('style')

@endpush
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
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
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
                                    <h3 class="card-title">{{__('messages.testimonial.testimonial_create')}}</h3>
                                </div>
                                <div class="col-6">
                                    <div class="float-right">

                                        <a href="{{ route('admin.testimonial.index') }}"  class="btn btn-primary btn-gradient btn-sm">{{__('messages.common.back')}}</a>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body table-responsive p-4">
                            <form action="{{ route('admin.testimonial.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="image" class="form-lable">{{__('messages.common.image')}}
                                                <br><small class="text-info fw-bold"><strong>({{__('messages.settings_home_content.recommended_size')}} 150x150px)</strong></small>
                                            </label>
                                            <input type="file" name="image" id="image" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="name" class="form-lable">{{__('messages.customer.user_name')}}<span class="text-danger">*</span></label>
                                            <input type="text" name="name" id="name" placeholder="{{__('messages.customer.enter_user_name')}}" class="form-control"
                                                required value="{{ old('name') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="designation" class="form-lable">{{__('messages.common.designation')}}<span class="text-danger">*</span></label>
                                            <input type="text" name="designation" id="designation" placeholder="{{__('messages.common.designation')}}" class="form-control"
                                                required value="{{ old('designation') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="order_id" class="form-label">{{__('messages.plan.order_number')}}</label>
                                            <input type="number" name="order_id" id="order_id" value="{{old('order_id')}}" class="form-control"
                                                placeholder="{{__('messages.plan.order_number')}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="status" class="form-label">{{__('messages.common.status')}}</label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>{{__('messages.common.published')}}</option>
                                                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>{{__('messages.common.unpublished')}}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="details" class="form-lable">{{__('messages.common.message')}}</label>
                                            <textarea name="details" id="details" class="form-control" placeholder="{{__('messages.common.message')}}"
                                                 cols="30" rows="10"> {{ old('details') }} </textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="details_de" class="form-lable">{{__('messages.common.message')}}(ger)</label>
                                            <textarea name="details_de" id="details_de" class="form-control" placeholder="{{__('messages.common.message')}}"
                                                 cols="30" rows="10"> {{ old('details_de') }} </textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success">{{__('messages.testimonial.create')}}</button>
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

@endpush



