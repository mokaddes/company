@extends('admin.layouts.master')

@section('admin-user', 'active')
@section('title') Admin create @endsection

@push('style')
@endpush

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ __('messages.roles.admin_create') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('messages.nav.dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item active">{{ __('messages.roles.admin_create') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="m-0">{{ __('messages.roles.admin_create') }}
                                    <span class="float-right">
                                        <a href="{{ route('admin.user.index') }}" class="btn btn-sm btn-primary btn-gradient"> <i
                                            class="fa fa-angle-left"></i> {{__('messages.common.back')}}</a>
                                    </span>
                                </h5>
                            </div>
                            <div class="card-body">

                                <form method="POST" action="{{ route('admin.user.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="image" class="form-lable">{{__('messages.crud.user_image')}} 
                                                <br><small class="text-info fw-bold"><strong>({{__('messages.settings_home_content.recommended_size')}} 150x150px)</strong></small>
                                            </label>
                                            <input type="file" name="image" id="image" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">{{__('messages.common.name')}} <span class="text-danger">*</span></label>
                                        <input value="{{ old('name') }}" type="text" class="form-control" name="name"
                                            placeholder="{{__('messages.common.name')}}" required>

                                        @if ($errors->has('name'))
                                            <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">{{__('messages.common.email')}} <span class="text-danger">*</span></label>
                                        <input value="{{ old('email') }}" type="email" class="form-control" name="email"
                                            placeholder="{{__('auth.placeholder.enter_your_email')}}" required>
                                        @if ($errors->has('email'))
                                            <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">{{__('messages.common.password')}} <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-flat">
                                            <input type="password" name="password" id="password-field" value="" class="form-control" required>
                                            <span class="input-group-text px-3">
                                                <a href="javascript:void(0)"
                                                    class="link-secondary fa fa-fw fa-eye field-icon toggle-password"
                                                    toggle="#password-field">
                                                </a>
                                            </span>
                                        </div>
                                        @if ($errors->has('password'))
                                            <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>

                                    <div class="mb-3">
                                        <label for="role" class="form-label">{{__('messages.roles.role')}} <span class="text-danger">*</span></label>
                                        <select class="form-control" name="roles" required>
                                            <option value="">{{__('messages.roles.select_role')}}</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('roles'))
                                            <span class="text-danger text-left">{{ $errors->first('roles') }}</span>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="status" class="form-label">{{__('messages.common.status')}} <span class="text-danger">*</span></label>
                                        <select class="form-control form-select" name="status" id="status" required>
                                            <option value="1" {{ old('status') == '1' ? 'selected' : ''}}>{{__('messages.common.active')}}</option>
                                            <option value="0" {{ old('status') == '0' ? 'selected' : ''}}>{{__('messages.common.inactive')}}</option>
                                        </select>
                                        @if ($errors->has('status'))
                                            <span class="text-danger text-left">{{ $errors->first('status') }}</span>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-success">{{__('messages.common.save')}}</button>
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
    $(document).ready(function () {
        // password show hide
        $(".toggle-password").click(function () {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    });
</script>
@endpush
