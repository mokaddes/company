@extends('admin.layouts.master')
@section('dashboard', 'active')

@section('title') {{ $data['title'] ?? '' }} @endsection
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $data['title'] ?? __('messages.common.dashboard') }}</h1>
                        <div>{{ __('messages.Welcome_Back') }}, {{ Auth::user()->name }}</div>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{__('messages.common.dashboard')}}</a></li>
                           
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-6">
                    
                    <div class="small-box bg-info">
                    <div class="inner">
                    <h3>{{$data['cards']}}</h3>
                    <p>{{__('messages.user_dashboard.total_cards')}}</p>
                    </div>
                    <div class="icon">
                    <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{route('admin.card.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                    </div>
                    
                    <div class="col-lg-3 col-6">
                    
                    <div class="small-box bg-success">
                    <div class="inner">
                    <h3>{{($data['plan'])}}</h3>
                    <p>{{__('messages.user_dashboard.total_package')}}</p>
                    </div>
                    <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{route('admin.plan.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                    </div>
                    
                    <div class="col-lg-3 col-6">
                    
                    <div class="small-box bg-warning">
                    <div class="inner">
                    <h3>{{$data['users']->count()}}</h3>
                    <p>{{__('messages.common.total_users')}}</p>
                    </div>
                    <div class="icon">
                    <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{route('admin.customer.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                    </div>
                    
                    <div class="col-lg-3 col-6">
                    
                    <div class="small-box bg-danger">
                    <div class="inner">
                    <h3>{{ number_format($data['totalTransaction'], 2, ',', '') }} €</h3>
                    <p>{{__('messages.user_dashboard.total_transaction')}}</p>
                    </div>
                    <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{route('admin.transaction.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                    </div>
                    
                    </div>
                    <div class="clearfix hidden-md-up"></div>
                <div class="row">               

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="">
                                        <h4 class="card-title">{{__('messages.user_dashboard.latest_cards')}} </h4>
                                    </div>
                                    <div class="">
                                        <a href="{{ route('admin.card.index') }}" class="btn btn-sm btn-primary btn-gradient">{{__('messages.common.view_all')}}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0 table-responsive">
                                <table  class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>{{__('messages.common.image')}}</th>
                                            <th>{{__('messages.common.card_name')}}</th>
                                            <th>{{__('messages.common.user')}}</th>
                                            <th>{{__('messages.customer.contact_info')}}</th>
                                     
                                            <th>{{__('messages.common.views')}}</th>
                                            <th>{{__('messages.common.date')}}</th>
                                            <th>{{__('messages.common.status')}}</th>
                                            <th>{{__('messages.common.actions')}}</th>
                                        </tr>
                                    </thead>

                                    <tfoot>
                                        <tr>
                                            <th>SN</th>
                                            <th>{{__('messages.common.image')}}</th>
                                            <th>{{__('messages.common.card_name')}}</th>
                                            <th>{{__('messages.common.user')}}</th>
                                            <th>{{__('messages.customer.contact_info')}}</th>
                                     
                                            <th>{{__('messages.common.views')}}</th>
                                            <th>{{__('messages.common.date')}}</th>
                                            <th>{{__('messages.common.status')}}</th>
                                            <th>{{__('messages.common.actions')}}</th>
                                        </tr>
                                    </tfoot>

                                    <tbody>
                                    @foreach($data['userCards'] as $row)

                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>
                                                <img src="{{ getIcon($row->profile_image) }}" width="50"
                                                     class="rounded-pill" alt="">
                                            </td>
                                            <td>
                                                <a href="{{route('card.preview',['card_url'=>$row->url_alias])}}" class="text-info" target="_blank">
                                                {{$row?->first_name}} {{$row?->last_name}}
                                                </a>
                                            </td>
                                            <td><a href="{{route('admin.customer.view',['id'=>$row->user_id])}}">{{$row?->user?->name}}</a></td>
                                            <td>
                                                @if($row?->email)
                                                    <p class="mb-0"></span><a href="mailto:{{$row?->email}}">{{$row?->email}}</a>
                                                    </p>

                                                @endif

                                                @if($row?->phone)
                                                    <p class="mb-0"> <a href="tel:{{$row?->phone}}">{{$row?->phone}}</a>
                                                    </p>
                                                @endif
                                            </td>
                                           
                                            <td>{{$row->analytics_count ?? 0}}</td>
                                            <td>{{date('d-m-Y',strtotime($row?->updated_at))}}</td>
                                            <td>
                                                @if($row->status == '1')
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
                                                        <a href="{{route('card.preview',['card_url'=>$row->url_alias])}}" target="_blank" class="dropdown-item">{{__('messages.common.preview')}}</a>
                                                        <a href="{{route('admin.card.status',['id'=>$row->id])}}"
                                                           onclick="return confirm('Are you sure to change status?')"
                                                           class="dropdown-item">
                                                            @if($row->status == '1')

                                                                {{__('messages.common.deactive')}}
                                                            @else
                                                                {{__('messages.common.active')}}
                                                            @endif

                                                        </a>
                                                        <a href="{{route('admin.card.edit',['id'=>$row->id])}}"
                                                           class="dropdown-item">{{__('messages.common.edit')}}</a>
                                                        <a href="{{route('admin.card.delete',['id'=>$row->id])}}" id="deleteData" class="dropdown-item text-danger">{{__('messages.common.delete')}}</a>
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
