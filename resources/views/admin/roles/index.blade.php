@extends('admin.layouts.master')

@section('admin-roles', 'active')
@section('title') Admin| roles @endsection

@push('style')
@endpush

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ __('Admin roles list') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('messages.nav.dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item active">{{ __('Admin roles list') }}</li>
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
                                <h5 class="m-0">{{ __('Admin roles') }}
                                    <span class="float-right">
                                        <a href="{{ route('admin.user.index') }}" class="btn btn-sm btn-primary btn-gradient">{{__('messages.roles.all_admins')}}</a>
                                        <a href="{{ route('admin.roles.create') }}" class="btn btn-sm btn-primary btn-gradient">+ {{__('messages.roles.create_role')}}</a>
                                    </span>
                                </h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <th width="1%">No</th>
                                        <th>{{__('messages.common.name')}}</th>
                                        <th>{{__('messages.roles.permission')}}</th>
                                        <th width="10%" colspan="3" class="text-center">{{__('messages.common.action')}}</th>
                                    </tr>
                                    @foreach ($roles as $key => $role)
                                        <tr>
                                            <td>{{ $role->id }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>
                                                <div>
                                                    @foreach ($role->permissions as $item)
                                                        <span
                                                            class="badge badge-primary permission">{{ __($item->name) }}</span>
                                                    @endforeach
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                {{-- <a class="btn btn-info btn-xs"
                                                    href="{{ route('admin.roles.show', $role->id) }}">Show</a> --}}
                                                <a class="btn btn-primary btn-xs" href="{{ route('admin.roles.edit', $role->id) }}"><i class="fa fa-pencil"></i> {{__('messages.common.edit')}}</a>

                                                {{-- <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST"
                                                    class="d-inline">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button
                                                        onclick="return confirm('Are you sure you want to delete this item?');"
                                                        class="btn btn-danger btn-xs">Delete</button>
                                                </form> --}}

                                            </td>
                                        </tr>
                                    @endforeach
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
