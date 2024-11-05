@extends('admin.layouts.master')
@section('plan', 'active')

@section('title') {{ $title ?? '' }} @endsection
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $title ?? __('messages.common.plan') }} {{ __('messages.common.list') }} </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{__('messages.common.dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{__('messages.common.plan')}}</li>
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
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="">
                                        <h4 class="card-title">{{ $title ?? __('messages.common.plan') }}</h4>
                                    </div>
                                    <div class="">
                                        <a href="{{ route('admin.plan.create') }}" class="btn btn-sm btn-primary btn-gradient">{{__('messages.plan.add_plan')}}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0 table-responsive">
                                <table id="dataTables" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>{{__('messages.plan.plan_name')}}</th>
                                            <th>{{__('messages.plan.plan_type')}}</th>
                                            <th>{{__('messages.common.price')}}</th>
                                            <th>{{__('messages.plan.no_of_vcards')}}</th>
                                            <th>{{__('messages.plan.package_limitations')}}</th>                                        
                                            <th>{{__('messages.common.self_branding')}}</th>
                                            <th>{{__('messages.common.analytics')}}</th>
                                            <th>{{__('messages.common.status')}}</th>
                                            <th>{{__('messages.common.actions')}}</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>SN</th>
                                            <th>{{__('messages.plan.plan_name')}}</th>
                                            <th>{{__('messages.plan.plan_type')}}</th>
                                            <th>{{__('messages.common.price')}}</th>
                                            <th>{{__('messages.plan.no_of_vcards')}}</th>
                                            <th>{{__('messages.plan.package_limitations')}}</th>                                        
                                            <th>{{__('messages.common.self_branding')}}</th>
                                            <th>{{__('messages.common.analytics')}}</th>
                                            <th>{{__('messages.common.status')}}</th>
                                            <th>{{__('messages.common.actions')}}</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($plan as $key => $row)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>
                                                @if (checkFrontLanguageSession() == 'en')
                                                    {{$row->name}}
                                                @elseif(checkFrontLanguageSession() == 'de')
                                                    {{$row->name_de}}
                                                @endif
                                            </td>
                                            <td>{{$row->frequency == '1' ? __('messages.plan.monthly') : __('messages.plan.yearly')}}</td>
                                            <td>{{$row->currency}} {{ number_format($row->price, 2, ',', '') }}</td>
                                            <td>{{$row->no_of_vcards}}</td>
                                            <td>{{$row->day}} {{__('messages.common.days')}}</td>
                                            
                                            <td>{{$row->self_branding == 1 ? __('messages.common.yess') : __('messages.common.noo')}}</td>
                                            <td>{{$row->analytics == 1 ? __('messages.common.yess') : __('messages.common.noo')}}</td>
                                            <td>
                                                @if($row->status == 1)
                                                    <span class="text-success">{{__('messages.common.active')}}</span>
                                                @else
                                                    <span class="text-danger">{{__('messages.common.deactive')}}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-xs btn-secondary dropdown-toggle btn-sm btn-gradient" type="button"
                                                        data-toggle="dropdown" aria-expanded="false">
                                                        {{__('messages.common.actions')}}
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        @if (Auth::user()->can('admin.plan.edit'))
                                                        <a href="{{ route('admin.plan.edit', $row->id) }}"  class="dropdown-item"><i class="fa fa-pencil"></i> {{__('messages.common.edit')}}</a>
                                                        @endif
                                                        @if (Auth::user()->can('admin.card.index'))
                                                        <a href="{{route('admin.card.index', $row->id)}}" id="deleteData" class="dropdown-item"><i class="fa fa-trash"></i> {{__('messages.common.delete')}}</a>
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
