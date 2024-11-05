@extends('admin.layouts.master')
@section('customer', 'active')
@section('title') {{ $data['title'] ?? '' }} @endsection

@push('style')
    <style>
        td {
            width: 0;
        }
    </style>
@endpush
@php
    $user = $data['user'];
    $cards = $data['cards'];
    $localLanguage = Session::get('languageName');

    $today = \Carbon\Carbon::today();
    $validDate = \Carbon\Carbon::parse($user->current_pan_valid_date);
    $day = $today->diffInDays($validDate, false);
    $day = $day < 0 ? 0 : $day;
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
                                        <h3 class="card-title"> {{ __('messages.crud.customer_view') }}</h3>
                                    </div>
                                    <div class="col-6">
                                        <div class="float-right">
                                            <a href="{{ route('admin.customer.index') }}"
                                                class="btn btn-primary btn-gradient btn-sm">{{ __('messages.common.back') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body p-0 table-responsive p-4">
                                <table class="table">
                                    <tr>
                                        <td style="width:10%;">{{__('messages.common.image')}} :</td>
                                        <td><img src="{{ getProfile($user->image) }}" width="100" alt=""></td>
                                    </tr>
                                    <tr>
                                        <td>{{__('messages.common.name')}} : </td>
                                        <td>{{ $user->name }}</td>
                                    </tr>
                                    {{-- <tr>
                                    <td>Customer Role :</td>
                                    <td>{{ $user->role->name }}</td>
                                </tr> --}}
                                    <tr>
                                        <td>{{__('messages.common.email')}} : </td>
                                        <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                                    </tr>
                                    @if ($user->phone)
                                        <tr>
                                            <td>{{__('messages.common.phone')}} : </td>
                                            <td> <a href="tel:{{ $user->phone }}">+49{{ $user->phone }}</a></td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td>{{__('messages.common.status')}} :</td>
                                        <td>
                                            @if ($user->status == 1)
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-danger">Active</span>
                                            @endif

                                        </td>
                                    </tr>
                                    @if ($user->address)
                                        <tr>
                                            <td> {{__('messages.common.address')}} :</td>
                                            <td>{{ $user->address }}</td>
                                        </tr>
                                    @endif
                                    @if ($user->current_pan_id)
                                        <tr>
                                            <td> {{__('messages.customer.current_plan')}} :</td>
                                            <td>{{ $localLanguage == 'en' ? $user->userPlan->name : $user->userPlan->name_de }}
                                            </td>
                                        </tr>
                                    @endif
                                    @if ($user->current_pan_valid_date)
                                        <tr>
                                            <td> {{__('messages.customer.plan_validty')}} :</td>
                                            <td>{{ $day}} Days
                                            </td>
                                        </tr>
                                    @endif

                                    @if (isset($user->card) && count($user->card) > 0)
                                    <tr>
                                        <td> {{__('messages.customer.total_card')}} :</td>
                                        <td> {{ count($user->card)}}
                                        </td>
                                    </tr>
                                @endif

                                </table>
                            </div>

                        </div>

                        @if (isset($cards) && count($cards) > 0)
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{__('messages.common.cards')}}</h4>
                            </div>
                            <div class="card-body">
                                <div class="card-body p-0 table-responsive">
                                     <table id="dataTables" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>{{__('messages.common.image')}}</th>
                                                <th>{{__('messages.common.card_name')}}</th>
                                                <th>{{__('messages.common.link')}}</th>
                                                <th>{{__('messages.common.views')}}</th>
                                                <th>{{__('messages.common.date')}}</th>
                                                <th>{{__('messages.common.status')}}</th>
                                                <th>{{__('messages.common.actions')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cards as $card)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>
                                                    <img src="{{ getProfile($card->profile_image) }}" height="50" width="50"
                                                    class="rounded-pill" alt="">
                                                </td>
                                                <td>{{$card->first_name ?? ''}}&nbsp;{{$card->last_name ?? ''}}</td>
                                                <td><a href="{{route('card.preview', $card->url_alias)}}" class="text-info" target="_blank">{{$card->url_alias}}</a></td>
                                                <td>{{$card->analytics_count ?? 0}}</td>
                                                <td>{{date('d F, Y',strtotime($card->created_at))}}</td>
                                                <td>
                                                    <span class="badge badge-{{$card->status == '1' ? 'success' : 'danger' }}">
                                                        {{$card->status == '1' ? __('messages.common.active') : __('messages.common.inactive') }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <a href="{{route('card.preview', $card->url_alias)}}" class="btn btn-info">{{__('messages.common.preview')}}</a>
                                                    {{-- <div class="dropdown">
                                                        <button class="btn btn-xs btn-secondary dropdown-toggle btn-sm" type="button"
                                                            data-toggle="dropdown" aria-expanded="false">
                                                            {{__('messages.common.actions')}}
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a href="#" target="_blank" class="dropdown-item">{{__('messages.common.preview')}}</a>
                                                            <a href="#"
                                                                onclick="return confirm('Are you sure to change status?')"
                                                                class="dropdown-item">{{__('messages.common.active')}}</a>
                                                            <a href="#" id="deleteData" class="dropdown-item text-danger">{{__('messages.common.delete')}}</a>
                                                        </div>
                                                    </div> --}}
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
