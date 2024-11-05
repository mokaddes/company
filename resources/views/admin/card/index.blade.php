@extends('admin.layouts.master')
@section('card', 'active')

@section('title') {{ $title ?? '' }} @endsection
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $title ?? 'Card' }} {{ __('messages.common.list') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{__('messages.common.dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{$title}}</li>
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
                                <h4 class="card-title">{{__('messages.common.cards')}}</h4>
                            </div>
                            <div class="card-body p-0 table-responsive">
                                 <table id="dataTables" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>{{__('messages.common.image')}}</th>
                                            <th>{{__('messages.common.card_name')}}</th>
                                            <th>{{__('messages.common.user')}}</th>
                                            <th>{{__('messages.customer.contact_info')}}</th>
                                            <th>{{__('messages.common.link')}}</th>
                                            <th>{{__('messages.common.views')}}</th>
                                            <th>{{__('messages.card.last_update')}}</th>
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
                                            <th>{{__('messages.common.link')}}</th>
                                            <th>{{__('messages.common.views')}}</th>
                                            <th>{{__('messages.card.last_update')}}</th>
                                            <th>{{__('messages.common.status')}}</th>
                                            <th>{{__('messages.common.actions')}}</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                    @foreach($cards as $row)

                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>
                                                <img src="{{ getIcon($row->profile_image) }}" width="50"
                                                class="rounded-pill" alt="{{$row?->first_name}} {{$row?->last_name}}">
                                            </td>
                                            <td>{{$row?->first_name}} {{$row?->last_name}}</td>
                                            <td>
                                                @if (Auth::user()->can('admin.customer.view'))
                                                    <a href="{{route('admin.customer.view',['id'=>$row->user_id])}}" class="text-capitalize">{{$row?->user?->name}}</a>
                                                @else 
                                                    {{  $row?->user?->name  }}
                                                @endif
                                            </td>
                                            <td>
                                                @if($row?->email)
                                                    <p class="mb-0"><a href="mailto:{{$row?->email}}">{{$row?->email}}</a>
                                                    </p>

                                                @endif

                                                @if($row?->phone)
                                                    <p class="mb-0"><a href="tel:{{$row?->phone}}">{{$row?->phone}}</a>
                                                    </p>
                                                @endif


                                            </td>
                                            <td>
                                                <a title="Click for preview" href="{{route('card.preview',['card_url'=>$row->url_alias])}}" class="text-info" target="_blank">{{$row?->url_alias}}</a>
                                            </td>
                                            <td>{{$row->analytics_count ?? 0}}</td>
                                            <td>
                                                <div>{{ date('d M, Y', strtotime($row->created_at)) }}</div>
                                                <div>{{ date('h:i A', strtotime($row->created_at)) }}</div>
                                                
                                            </td>
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
                                                        <a href="{{route('card.preview',['card_url'=>$row->url_alias])}}" target="_blank" class="dropdown-item"><i class="fa fa-eye"></i> {{__('messages.common.preview')}}</a>
                                                        <a href="{{route('admin.card.status',['id'=>$row->id])}}"
                                                            onclick="return confirm('Are you sure to change status?')"
                                                            class="dropdown-item"><i class="fa fa-rainbow"></i>
                                                            @if($row->status == '1')

                                                                {{__('messages.common.deactive')}}
                                                            @else
                                                                {{__('messages.common.active')}}
                                                            @endif

                                                        </a>
                                                        @if (Auth::user()->can('admin.card.edit'))
                                                        <a href="{{route('admin.card.edit',['id'=>$row->id])}}"  class="dropdown-item"><i class="fa fa-pencil"></i> {{__('messages.common.edit')}}</a>
                                                        @endif
                                                        @if (Auth::user()->can('admin.card.delete'))
                                                        <a href="{{route('admin.card.delete',['id'=>$row->id])}}" id="deleteData" class="dropdown-item"><i class="fa fa-trash"></i> {{__('messages.common.delete')}}</a>
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
