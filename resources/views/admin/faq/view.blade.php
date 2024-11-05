@extends('admin.layouts.master')
@section('faq', 'active')
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.faq.index') }}">Manage Faq</a></li>
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
                                        <h3 class="card-title">{{ $data['title'] ?? '' }}</h3>
                                    </div>
                                    <div class="col-6">
                                        <div class="float-right">
                                            <a href="{{ route('admin.faq.index') }}" class="btn btn-primary btn-gradient btn-sm">{{__('messages.common.back')}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body table-responsive p-4">
                                <table class="table">
                                    <tr>
                                        <td style="width:15%;">{{__('messages.common.question')}} (English):</td>
                                        <td>{{ $row->title }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{__('messages.common.answer')}} (English):</td>
                                        <td>{!! $row->body !!}</td>
                                    </tr>
                                    <tr>
                                        <td style="width:15%;">{{__('messages.common.question')}} (German):</td>
                                        <td>{{ $row->title_de }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{__('messages.common.answer')}} (German):</td>
                                        <td>{!! $row->body_de !!}</td>
                                    </tr>
                                    <tr>
                                        <td>{{__('messages.common.status')}} :</td>
                                        <td>
                                            @if ($row->is_active == 1)
                                                <span class="badge badge-success">{{__('messages.common.active')}}</span>
                                            @else
                                                <span class="badge badge-danger">{{__('messages.common.inactive')}}</span>
                                            @endif
                                        </td>
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
