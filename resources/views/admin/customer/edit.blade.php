@extends('admin.layouts.master')

@section('customer', 'active')
@section('title') {{ $data['title'] ?? '' }} @endsection

@push('style')
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
@php
     $user = $data['user'];
    $role = $data['role'];
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
                                    <h3 class="card-title">{{__('messages.common.manage')}} {{ $data['title'] ?? '' }} </h3>
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
                            <form action="{{ route('admin.customer.update',$user->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="image" class="form-label">{{__('messages.customer.user_image')}}
                                                <br><small class="text-info fw-bold"><strong>({{__('messages.settings_home_content.recommended_size')}} 150x150px)</strong></small>
                                            </label>
                                            <input type="file" name="image" id="image" class="form-control" >
                                            <img src="{{getProfile($user->image)}}" alt="" width="100" height="100" class="mt-2">
                                              {{-- <img class="custom-img mt-2" src="@if($user->image)
                                                {{ asset($user->image) }}
                                                @else
                                                    {{ asset('assets/images/default-user.png') }}
                                              @endif" alt="{{ $user->name }}" width="60" height="80"> --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="name" class="form-label">{{__('messages.customer.user_name')}}<span class="text-danger">*</span></label>
                                            <input type="text" name="name" value="{{ $user->name }}" id="name" placeholder="{{__('messages.customer.enter_user_name')}}"
                                            class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="email" class="form-label">{{__('messages.customer.user_mail')}}<span class="text-danger">*</span></label>
                                            <input type="email" name="email" value="{{ $user->email }}"  id="email" placeholder="{{__('messages.customer.enter_email_address')}}"
                                            class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="phone" class="form-label">{{__('messages.customer.user_phone')}}<span class="text-danger">*</span></label>
                                            <input type="tel" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                                name="phone" id="phone" value="{{ $user->phone }}"  placeholder="{{__('messages.customer.enter_phone_number')}}"
                                                class="form-control" required>
                                        </div>
                                    </div>
                                     <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="status" class="form-label">{{__('messages.customer.published_status')}}<span class="text-danger">*</span></label>
                                            <select name="status" id="status" class="form-control" required>
                                                <option value="1" {{ $user->status == 1? "selected" : "" }}>{{__('messages.customer.published')}}</option>
                                                <option value="0" {{ $user->status == 0? "selected" : "" }}>{{__('messages.customer.unpublished')}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="address" class="form-label">{{__('messages.customer.user_address')}}</label>
                                            <textarea name="address" value="" id="address" placeholder="{{__('messages.customer.user_address')}}"
                                            class="form-control"> {{ $user->address }}</textarea>
                                        </div>
                                    </div>

                                </div>
                                {{-- <hr>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="password" class="form-label">User Password (If you want to change password)</label>
                                            <input type="password" name="password"  id="password" class="form-control">
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success">{{__('messages.common.update_user')}}</button>
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



