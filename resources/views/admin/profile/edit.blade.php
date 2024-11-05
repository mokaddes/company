@extends('admin.layouts.master')
@section('title') {{ $data['title'] ?? 'Profile' }} @endsection
@php
    $user= Auth::user();
@endphp
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Profile Edit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Profile edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Profile Update</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.profile.update')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="" class="form-label">Profile Image 
                                        <br><small class="text-info fw-bold"><strong>({{__('messages.settings_home_content.recommended_size')}} 150x150px)</strong></small>
                                    </label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" value="{{$user->name ?? old('name')}}" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" value="{{$user->email ?? old('email')}}" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Change Password</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.password.update')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="" class="form-label">New Password <span class="text-danger">*</span></label>
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
                                <div class="form-group">
                                    <label for="" class="form-label">Confirm New Password <span class="text-danger">*</span></label>
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
                                 <button type="submit" class="btn btn-success">Change Password</button>
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
