@extends('admin.layouts.master')

@section('testimonial', 'active')
@section('title') {{ $title ?? __('messages.common.user') }} @endsection

@push('style')
@endpush
@php
    $localLanguage = Session::get('languageName');
@endphp
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $title  }} {{ __('messages.common.list') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('messages.common.dashboard') }}</a></li>
                            <li class="breadcrumb-item active">{{ $title ?? __('messages.common.testimonial') }}</li>
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
                                        <h3 class="card-title">{{ __('messages.common.manage') }}
                                            {{ $title ?? __('messages.common.testimonial') }} </h3>
                                    </div>
                                    <div class="col-6">
                                        <div class="float-right">
                                            @if (Auth::user()->can('admin.customer.create'))
                                                <a href="{{ route('admin.testimonial.create') }}"
                                                    class="btn btn-primary btn-gradient btn-sm">{{ __('messages.common.add_new') }}</a>
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
                                            <th>{{ __('messages.common.image') }}</th>
                                            <th>{{ __('messages.common.name') }}</th>
                                            <th>{{ __('messages.common.message') }}(en)</th>
                                            <th>{{ __('messages.common.message') }}(ger)</th>
                                            <th>{{ __('messages.plan.order_number') }}</th>
                                            <th>{{ __('messages.common.status') }}</th>
                                            <th>{{ __('messages.common.action') }}</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>SL</th>
                                            <th>{{ __('messages.common.image') }}</th>
                                            <th>{{ __('messages.common.name') }}</th>
                                            <th>{{ __('messages.common.message') }}(en)</th>
                                            <th>{{ __('messages.common.message') }}(ger)</th>
                                            <th>{{ __('messages.plan.order_number') }}</th>
                                            <th>{{ __('messages.common.status') }}</th>
                                            <th>{{ __('messages.common.action') }}</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @if (isset($testimonials) && count($testimonials) > 0)
                                            @foreach ($testimonials as $key => $row)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>
                                                        <img src="{{getProfile($row->image)}}" alt="" height="70" width="70">
                                                    </td>
                                                    <td>{{ $row->name }} <br>
                                                        <small>{{$row->designation}}</small>

                                                    </td>
                                                    <td>{{ Str::limit($row->details,50,"...")}}</td>
                                                    <td>{{ Str::limit($row->details_de,50,"...")}}</td>
                                                    <td> {{$row->order_id}} </td>
                                                    <td>
                                                        @if ($row->status == 1)
                                                            <span
                                                                class="text-success">{{ __('messages.common.published') }}</span>
                                                        @else
                                                            <span
                                                                class="text-danger">{{ __('messages.common.unpublished') }}</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-xs btn-secondary dropdown-toggle btn-sm btn-gradient"
                                                                type="button" data-toggle="dropdown" aria-expanded="false">
                                                                {{ __('messages.common.actions') }}
                                                            </button>
                                                            <div class="dropdown-menu">


                                                                @if (Auth::user()->can('admin.customer.view'))

                                                                <a href="{{ route('admin.testimonial.view', $row->id) }}"
                                                                    class="view dropdown-item"><i class="fa fa-eye" ></i> {{ __('messages.common.view') }}</a>

                                                                @endif

                                                                @if (Auth::user()->can('admin.customer.edit'))
                                                                    <a href="{{ route('admin.testimonial.edit', $row->id) }}"
                                                                        class="edit dropdown-item"><i class="fa fa-pencil" ></i> {{ __('messages.common.edit') }}</a>
                                                                @endif

                                                                @if (Auth::user()->can('admin.customer.delete'))
                                                                    <a href="{{ route('admin.testimonial.delete', $row->id) }}"
                                                                        id="deleteData"
                                                                        class="dropdown-item"><i class="fa fa-trash" ></i> {{ __('messages.common.delete') }}</a>
                                                                @endif
                                                            </div>
                                                        </div>

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
@push('script')

@endpush
