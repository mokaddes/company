@extends('admin.layouts.master')

@section('admin-user', 'active')
@section('title') Admins @endsection

@push('style')
@endpush

@php
$userr = Auth::user();
@endphp

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('messages.roles.admins') }} {{ __('messages.common.list') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('messages.nav.dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('messages.roles.admin') }}</li>
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
                            <h5 class="m-0">{{ __('messages.roles.admin') }}
                                <span class="float-right">
                                    <a href="{{ route('admin.user.create') }}" class="btn btn-sm btn-primary btn-gradient">+ {{__('messages.roles.create_admin')}}</a>
                                </span>
                            </h5>
                        </div>
                        <div class="card-body table-responsive p-0">
                             <table id="dataTables" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%">SN</th>
                                        <th>{{__('messages.common.name')}}</th>
                                        <th>{{__('messages.common.email')}}</th>
                                        <th>{{__('messages.roles.role')}}</th>
                                        <th>{{__('messages.common.status')}}</th>
                                        <th width="15%">{{__('messages.common.action')}}</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th width="5%">SN</th>
                                        <th>{{__('messages.common.name')}}</th>
                                        <th>{{__('messages.common.email')}}</th>
                                        <th>{{__('messages.roles.role')}}</th>
                                        <th>{{__('messages.common.status')}}</th>
                                        <th width="15%">{{__('messages.common.action')}}</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @forelse ($users as $key=> $row)

                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $row->name }}</td>
                                            <td><a href="mailto:{{ $row->email }}" >{{ $row->email }}</a></td>
                                            <td>
                                                @foreach ($roles as $role)
                                                    {{ $row->hasRole($role->name) ? $role->name : '' }}
                                                @endforeach
                                            </td>
                                            <td>
                                                @if($row->status == 1)
                                                    <span class="text-success">{{__('messages.common.active')}}</span>
                                                @else
                                                    <span class="text-danger">{{__('messages.common.inactive')}}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-xs btn-secondary dropdown-toggle btn-sm btn-gradient" type="button"
                                                        data-toggle="dropdown" aria-expanded="false">
                                                        {{__('messages.common.actions')}}
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        @if (Auth::user()->can('admin.user.password.edit'))
                                                            <a href="{{ route('admin.user.password.edit', $row->id) }}" class="dropdown-item"  ><i class="fa fa-lock"></i> {{__('messages.common.change_password')}}</a>
                                                        @endif
                                                        
                                                        @if (Auth::user()->can('admin.user.edit'))
                                                            <a href="{{ route('admin.user.edit', $row->id) }}" class="dropdown-item"><i class="fa fa-pencil"></i> {{__('messages.common.edit')}}</a>
                                                        @endif                                                          

                                                    </div>
                                                </div>

                                               
                                                {{-- <a  href="{{ route('admin.user.destroy', $row->id) }}" id="deleteData" class="btn btn-danger btn-xs">Delete</a> --}}
                                            
                                            
                                            </td>
                                        </tr>
                                    @empty
                                        <td colspan="4">{{__('messages.roles.user_not_found')}}</td>
                                    @endforelse
                                </tbody>
                            </table>
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
