@extends('admin.layouts.master')
@section('work', 'active')

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
                                            @if (Auth::user()->can('admin.work.index'))
                                                <a href="{{ route('admin.work.create') }}" class="btn btn-primary btn-sm">Add
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
                                            <th width="5%">SL</th>
                                            <th width="10%">Thumbnail Image</th>
                                            <th width="25%">List Title</th>
                                            <th width="15%">Category</th>
                                            <th width="10%">Brand</th>
                                            <th width="10%">Published Status</th>
                                            <th width="15%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($works as $key => $work)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>
                                                    <img class="img-fluid" src="{{ getPhoto($work->thumbnail) }}" alt="Thumbnail Image" width="50px">
                                                </td>
                                                <td>{{ $work->title }}</td>
                                                <td>{{ $work->category }}</td>
                                                <td>{{ $work->brand }}</td>
                                                <td>
                                                    @if ($work->status == 1)
                                                        <span class="badge badge-success">Active</span>
                                                    @else
                                                        <span class="badge badge-danger">Inactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (Auth::user()->can('admin.work.edit'))
                                                        <a href="{{ route('admin.work.edit', $work->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                                    @endif
                                                    @if (Auth::user()->can('admin.work.delete'))
                                                        <a href="{{ route('admin.work.delete', $work->id) }}" id="deleteData" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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
