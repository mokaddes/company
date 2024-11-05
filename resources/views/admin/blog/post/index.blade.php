@extends('admin.layouts.master')
@section('blogDropdown', 'menu-open')
@section('blog-post', 'active')

@section('title') {{ $data['title'] ?? '' }} @endsection
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"> {{ $data['title'] ?? '' }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active"> {{ $data['title'] ?? '' }}</li>
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
                                        <h3 class="card-title">Manage {{ $data['title'] ?? '' }} </h3>
                                    </div>
                                    <div class="col-6">
                                        <div class="float-right">
                                            @if (Auth::user()->can('admin.blog-post.index'))
                                                <a href="{{ route('admin.blog-post.create') }}" class="btn btn-primary btn-sm">Add
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
                                            <th width="10%">Featured Image</th>
                                            <th width="25%">Post Title</th>
                                            <th width="15%">Category</th>
                                            <th width="10%">Date</th>
                                            <th width="10%">Published Status</th>
                                            <th width="15%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($data['rows']) && count($data['rows']) > 0)
                                            @foreach ($data['rows'] as $key => $row)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td><img src="{{ asset('assets/images/blog/' . $row->image) }}"
                                                            width="80" height="80" alt="fdsfds"></td>
                                                    <td>{{ $row->title }}</td>
                                                    <td>{{ $row->category->name }}</td>
                                                    <td>{{ date('d M Y', strtotime($row->created_at)) }}</td>
                                                    <td>
                                                        @if ($row->status == 1)
                                                            <span class="badge badge-success">Published</span>
                                                        @else
                                                            <span class="badge badge-danger">Unpublished</span>
                                                        @endif

                                                    </td>
                                                    <td>
                                                        @if (Auth::user()->can('admin.blog-post.index'))
                                                            <a href="{{ route('admin.blog-post.view', $row->id) }}"
                                                                class="btn btn-xs btn-primary">View</a>
                                                        @endif

                                                        @if (Auth::user()->can('admin.blog-post.index'))
                                                            <a href="{{ route('admin.blog-post.edit', $row->id) }}"
                                                                class="btn btn-xs btn-secondary">Edit</a>
                                                        @endif

                                                        @if (Auth::user()->can('admin.blog-post.index'))
                                                            <a href="{{ route('admin.blog-post.delete', $row->id) }}"
                                                                id="deleteData" class="btn btn-xs btn-danger">Delete</a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
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
