@extends('admin.layouts.master')
@section('title') {{ $data['title'] ?? '' }} @endsection
@section('cpage', 'active')
@php
    $rows = $data['rows'];
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
                                        <h3 class="card-title">{{__('messages.common.manage')}} {{ $data['title'] ?? '' }}</h3>
                                    </div>
                                    <div class="col-6">
                                        <div class="float-right">
                                            {{-- @if (Auth::user()->can('admin.cpage.index'))
                                                <a href="{{ route('admin.cpage.create') }}" class="btn btn-primary btn-sm">Add
                                                    New</a>
                                            @endif --}}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body table-responsive p-0">
                                <table id="dataTables" class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>{{__('messages.seo.page_name')}}</th>
                                            <th>{{__('messages.common.status')}}</th>
                                            <th style="width:15%;" class="text-center">{{__('messages.common.action')}}</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>SN</th>
                                            <th>{{__('messages.seo.page_name')}}</th>
                                            <th>{{__('messages.common.status')}}</th>
                                            <th style="width:15%;" class="text-center">{{__('messages.common.action')}}</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($rows as $key => $row)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $row->title }}</td>
                                                <td>
                                                    @if ($row->is_active == 1)
                                                        <span class="text-success">{{__('messages.common.published')}}</span>
                                                    @else
                                                        <span class="text-danger">{{__('messages.common.unpublished')}}</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    
                                                    <div class="dropdown">
                                                        <button class="btn btn-xs btn-secondary dropdown-toggle btn-sm btn-gradient" type="button"
                                                            data-toggle="dropdown" aria-expanded="false">
                                                            {{__('messages.common.actions')}}
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            @if (Auth::user()->can('admin.cpage.view'))
                                                            <a href="{{ route('admin.cpage.view', $row->id) }}" class="dropdown-item"><i class="fa fa-eye"></i> {{__('messages.common.view')}}</a>
                                                            @endif
                                                            
                                                            @if (Auth::user()->can('admin.cpage.edit'))
                                                            <a href="{{ route('admin.cpage.edit', $row->id) }}" class="dropdown-item"><i class="fa fa-pencil"></i> {{__('messages.common.edit')}}</a>
                                                            @endif                                                          

                                                        </div>
                                                    </div>


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
