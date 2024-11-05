@extends('admin.layouts.master')

@section('customer', 'active')
@section('title') {{ $data['title'] ?? '' }} @endsection

@push('style')

@endpush
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
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
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
                                    <h3 class="card-title">{{__('messages.crud.user_information')}}</h3>
                                </div>
                                <div class="col-6">
                                    <div class="float-right">
                                        @if (Auth::user()->can('admin.customer.index'))
                                        <a href="{{ route('admin.customer.index') }}"  class="btn btn-primary btn-gradient btn-sm">{{__('messages.common.back')}}</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body table-responsive p-4">
                            <form action="{{ route('admin.customer.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="image" class="form-lable">{{__('messages.customer.user_image')}}
                                                <br><small class="text-info fw-bold"><strong>({{__('messages.settings_home_content.recommended_size')}} 150x150px)</strong></small>
                                            </label>
                                            <input type="file" name="image" id="image" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="name" class="form-lable">{{__('messages.customer.user_name')}}<span class="text-danger">*</span></label>
                                            <input type="text" name="name" id="name" placeholder="{{__('messages.customer.enter_user_name')}}" class="form-control"
                                                required value="{{ old('name') }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="email" class="form-lable">{{__('messages.customer.user_email')}}<span class="text-danger">*</span></label>
                                            <input type="email" name="email" id="email" placeholder="{{__('messages.customer.enter_email_address')}}" class="form-control"
                                                required value="{{ old('email') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="password" class="form-lable">{{__('messages.customer.user_password')}}<span class="text-danger">*</span></label>
                                            <div class="input-group input-group-flat">
                                                <input type="password" name="password" id="password" placeholder="{{__('messages.customer.enter_password')}}" class="form-control" required>
                                                <span class="input-group-text">
                                                    <a href="javascript:void(0)"
                                                        class="link-secondary fa fa-fw fa-eye field-icon toggle-password"
                                                        toggle="#password">
                                                    </a>
                                                </span>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="phone" class="form-lable">{{__('messages.customer.user_phone')}}<span class="text-danger">*</span></label>
                                            <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" class="form-control" required
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                                placeholder="{{__('messages.customer.enter_phone_number')}}">
                                        </div>
                                    </div>
                                     <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="status" class="form-lable">{{__('messages.customer.published_status')}}<span class="text-danger">*</span></label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="1" {{ old('status') == "1" ? 'selected' : '' }}>{{__('messages.customer.published')}}</option>
                                                <option value="0" {{ old('address') == "0" ? 'selected' : '' }}>{{__('messages.customer.unpublished')}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="address" class="form-lable">{{__('messages.customer.user_address')}}</label>
                                            <textarea name="address" id="address" class="form-control" placeholder="{{__('messages.customer.user_address')}}"
                                                 cols="30" rows="10"> {{ old('address') }} </textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success">{{__('messages.common.add_user')}}</button>
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
    <script type="text/javascript">
        // password show hide
        $(".toggle-password").click(function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    </script>
@endpush



