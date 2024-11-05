@extends('admin.layouts.master')
@section('cpage', 'active')
@section('title') {{ $data['title'] ?? '' }} @endsection

@php
    $row = $data['row'];
@endphp

@push('style')
<style>
    td {
        width: 0;
    }
</style>
@endpush

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
                        <li class="breadcrumb-item"><a href="{{ route('admin.cpage.index') }}">Manage {{ $data['title'] ?? '' }}</a>
                        </li>
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
                                    <h3 class="card-title"> {{ $data['title'] ?? '' }}</h3>
                                </div>
                                <div class="col-6">
                                    <div class="float-right">
                                        <a href="{{ route('admin.cpage.index') }}" class="btn btn-primary btn-gradient btn-sm">Back</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <table class="table">
                            <tr>
                                <td style="width:10%;">Page Name :</td>
                                <td>{{ $row->title }}</td>
                            </tr>
                            <tr>
                                <td>Page Slug :</td>
                                <td>{{ $row->url_slug }}</td>
                            </tr>
                            <tr>
                                <td>Publihed Status :</td>
                                <td>
                                    @if ($row->is_active == 1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td  colspan="2">Description :
                                    <br>
                                    {!! $row->body !!}
                                </td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
