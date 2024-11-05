@extends('admin.layouts.master')
@section('blogDropdown', 'menu-open')
@section('blockDropdownMenu', 'd-block')
@section('post_create', 'active')
@section('title') {{ $data['title'] ?? '' }} @endsection

@push('style')
<style>
    td {
        width: 0;
    }
</style>
@endpush

@php
$row = $data['row'];
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
                        <li class="breadcrumb-item"><a href="{{ route('admin.blog-post.index') }}">Manage Post</a></li>
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
                                    <h3 class="card-title"> View Post</h3>
                                </div>
                                <div class="col-6">
                                    <div class="float-right">
                                        <a href="{{ route('admin.blog-post.index') }}" class="btn btn-primary btn-sm">Back</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body table-responsive p-4">
                            <table class="table">
                                <tr>
                                    <td>Featured Image</td>
                                    <td><img src="{{ asset('assets/images/blog/'.$row->image) }}" width="100" alt=""></td>
                                </tr>
                                <tr>
                                    <td>Post Title</td>
                                    <td>{{ $row->title }}</td>
                                </tr>
                                <tr>
                                    <td>Category</td>
                                    <td>{{ $row->category->name }}</td>
                                </tr>
                                <tr>
                                    <td>Publihed Status</td>
                                    <td>
                                        @if($row->status == 1)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                        <span class="badge badge-danger">Active</span>
                                        @endif

                                    </td>
                                </tr>
                                <tr>
                                    <td>Date</td>
                                    <td>{{ date('d M Y',strtotime($row->created_at)) }}</td>
                                </tr>
                                <tr>
                                    <td>Description</td>
                                    <td>{!! $row->details !!}</td>
                                </tr>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
