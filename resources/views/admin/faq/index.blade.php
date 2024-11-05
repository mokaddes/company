@extends('admin.layouts.master')
@section('faq', 'active')
@section('title'){{ $data['title'] ?? '' }} @endsection

@php
    $rows = $data['rows'];
@endphp

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $data['title'] ?? '' }} {{__('messages.common.list')}}</h1>
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
                                        <h3 class="card-title">{{__('messages.common.manage_faq')}} </h3>
                                    </div>
                                    <div class="col-6">
                                        <div class="float-right">
                                            @if (Auth::user()->can('admin.faq.create'))
                                                <a href="{{ route('admin.faq.create') }}" class="btn btn-primary btn-gradient btn-sm">{{__('messages.common.add_new')}}</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body table-responsive p-0">
                                 <table id="dataTables" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>{{__('messages.common.question')}}</th>
                                            <th>{{__('messages.common.answer')}}</th>
                                            <th>{{__('messages.crud.status')}}</th>
                                            <th>{{__('messages.plan.order_number')}}</th>
                                            <th>{{__('messages.common.action')}}</th>
                                        </tr>
                                    </thead>

                                    <tfoot>
                                        <tr>
                                            <th>SN</th>
                                            <th>{{__('messages.common.question')}}</th>
                                            <th>{{__('messages.common.answer')}}</th>
                                            <th>{{__('messages.common.status')}}</th>
                                            <th>{{__('messages.plan.order_number')}}</th>
                                            <th>{{__('messages.common.action')}}</th>
                                        </tr>
                                    </tfoot>

                                    <tbody>
                                        @foreach ($rows as $key => $row)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $row->title }}</td>
                                                <td>{!! Str::limit($row->body, 50, '...') !!}</td>
                                                <td>
                                                    @if ($row->is_active == 1)
                                                        <span class="text-success">Published</span>
                                                    @else
                                                        <span class="text-danger">Unpublished</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $row->order_id }}
                                                </td>
                                                <td>
                                                    
                                                    <div class="dropdown">
                                                        <button class="btn btn-xs btn-secondary dropdown-toggle btn-sm btn-gradient" type="button"
                                                            data-toggle="dropdown" aria-expanded="false">
                                                            {{__('messages.common.actions')}}
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            @if (Auth::user()->can('admin.faq.view'))
                                                            <a href="{{ route('admin.faq.view', $row->id) }}" class="dropdown-item"><i class="fa fa-eye"></i> {{__('messages.common.view')}}</a>
                                                            @endif
                                                            
                                                            @if (Auth::user()->can('admin.faq.edit'))
                                                            <a href="{{ route('admin.faq.edit', $row->id) }}" class="dropdown-item"><i class="fa fa-pencil"></i> {{__('messages.common.view')}}</a>
                                                            @endif

                                                            @if (Auth::user()->can('admin.faq.delete'))
                                                            <a href="{{route('admin.faq.delete', $row->id)}}" id="deleteData" class="dropdown-item"><i class="fa fa-trash"></i> {{__('messages.common.delete')}}</a>
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


@push('script')
@endpush
