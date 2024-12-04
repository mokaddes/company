@extends('admin.layouts.master')

@section('admin-user', 'active')
@section('title') Admin Edit @endsection

@push('style')
@endpush

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ __('messages.roles.admin_edit') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item active">{{ __('messages.roles.admin_edit') }}</li>
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
                                <h5 class="m-0">{{ __('messages.roles.admin_edit') }}
                                    <span class="float-right">
                                        <a href="{{ route('admin.user.index') }}" class="btn btn-sm btn-primary btn-gradient"> <i
                                            class="fa fa-angle-left"></i> {{__('messages.common.back')}}</a>
                                    </span>
                                </h5>
                            </div>
                            <div class="card-body">

                                <form method="post" action="{{ route('admin.user.update', $user->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $user->id }}" />
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="image" class="form-label">{{__('messages.crud.user_image')}}
                                                <br><small class="text-info fw-bold"><strong>({{__('messages.settings_home_content.recommended_size')}} 150x150px)</strong></small>
                                            </label>
                                            <input type="file" name="image" id="image" class="form-control" >
                                            <img src="{{ getProfile($user->image)}}" alt="{{ $user->name }}" class="custom-img mt-2" width="120" height="120">
                                              {{-- <img class="custom-img mt-2" src="@if($user->image)
                                                {{ asset($user->image) }}
                                                @else
                                                    {{ asset('assets/images/default-user.png') }}
                                              @endif" alt="{{ $user->name }}" width="120" height="120"> --}}
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">{{__('messages.common.name')}} <span class="text-danger">*</span></label>
                                        <input value="{{ $user->name }}" type="text" class="form-control" name="name"
                                            placeholder="{{__('messages.common.name')}}" required>
                                        @if ($errors->has('name'))
                                            <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">{{__('messages.common.email')}} <span class="text-danger">*</span></label>
                                        <input value="{{ $user->email }}" type="email" class="form-control" name="email"
                                            placeholder="{{__('messages.customer.enter_email_address')}}" required>
                                        @if ($errors->has('email'))
                                            <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>

                                    <div class="mb-3">
                                        <label for="role" class="form-label">{{__('messages.roles.role')}} <span class="text-danger">*</span></label>
                                        <select class="form-control" name="roles" required>
                                            <option value="">Select role</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}"
                                                    {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                                                    {{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('role'))
                                            <span class="text-danger text-left">{{ $errors->first('role') }}</span>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="status" class="form-label">{{__('messages.common.status')}} <span class="text-danger">*</span></label>
                                        <select class="form-control form-select" name="status" id="status" required>
                                            <option value="1" {{ $user->status == '1' ? 'selected' : ''}}>{{__('messages.common.active')}}</option>
                                            <option value="0" {{ $user->status == '0' ? 'selected' : ''}}>{{__('messages.common.inactive')}}</option>
                                        </select>
                                        @if ($errors->has('status'))
                                            <span class="text-danger text-left">{{ $errors->first('status') }}</span>
                                        @endif
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
@endpush
