@extends('admin.layouts.master')

@section('admin-user', 'active')
@section('title') Admin password edit @endsection

@push('style')
@endpush

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{__('messages.roles.admin_password')}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('messages.nav.dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item active">{{ __('messages.roles.password_edit') }}</li>
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
                                <h5 class="m-0">{{ __('messages.roles.password_edit') }}
                                    <span class="float-right">
                                        <a href="{{ route('admin.user.index') }}" class="btn btn-sm btn-primary btn-gradient"> <i
                                            class="fa fa-angle-left"></i> {{__('messages.common.back')}}</a>
                                    </span>
                                </h5>
                            </div>
                            <div class="card-body">

                                <form method="post" action="{{ route('admin.user.password.update', $user->id) }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $user->id }}" />
                                    <div class="form-group mb-3">
                                        <label for="" class="form-label">{{__('messages.user_profile.new_password')}} <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-flat">
                                            <input type="password" name="password" id="password-field" value="" class="form-control" required>
                                            <span class="input-group-text px-3">
                                                <a href="javascript:void(0)"
                                                    class="link-secondary fa fa-fw fa-eye field-icon toggle-password"
                                                    toggle="#password-field">
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="" class="form-label">{{__('messages.user_profile.confirm_password')}} <span class="text-danger">*</span></label>
                                        <div class="input-group input-group-flat">
                                            <input type="password" name="confirm_password" id="confirm_password" value="" class="form-control" required>
                                            <span class="input-group-text px-3">
                                                <a href="javascript:void(0)"
                                                    class="link-secondary fa fa-fw fa-eye field-icon confirm-toggle-password"
                                                    toggle="#confirm_password">
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success">{{__('messages.common.update')}}</button>
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

        $(".confirm-toggle-password").click(function () {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });

    })
</script>
@endpush
