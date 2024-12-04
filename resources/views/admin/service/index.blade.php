@extends('admin.layouts.master')
@section('service', 'active')

@section('title') {{ $title ?? '' }} @endsection
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"> {{ $title ?? '' }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active"> {{ $title ?? '' }}</li>
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
                                        <h3 class="card-title">Manage {{ $title ?? '' }} </h3>
                                    </div>
                                    <div class="col-6">
                                        <div class="float-right">
                                            @if (Auth::user()->can('admin.service.index'))
                                                <a href="{{ route('admin.service.create') }}" class="btn btn-primary btn-sm">Add
                                                    New</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body table-responsive p-0">
                                 <table id="dataTables" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Icon</th>
                                            <th>Name</th>
                                            <th>Header</th>
                                            <th>Color</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($services as $key => $service)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td style="background: #cdc1c1; text-align: center">
                                                    <img class="img-fluid" src="{{ getPhoto($service->icon) }}" alt="Icon Image" width="50px">
                                                </td>
                                                <td>{{ $service->name }}</td>
                                                <td>{{ $service->header }}</td>
                                                <td>
                                                    <span style="display: inline-block; width: 30px; height: 20px; background-color: {{ $service->color }}; border: 1px solid #ccc;"></span>
                                                </td>

                                                <td>
                                                    @if ($service->status == 1)
                                                        <span class="badge badge-success">Active</span>
                                                    @else
                                                        <span class="badge badge-danger">Inactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (Auth::user()->can('admin.service.edit'))
                                                        <a href="{{ route('admin.service.edit', $service->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                                    @endif
                                                    @if (Auth::user()->can('admin.service.delete'))
                                                        <a href="{{ route('admin.service.delete', $service->id) }}" id="deleteData" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
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
