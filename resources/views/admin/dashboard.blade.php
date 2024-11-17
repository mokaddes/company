@extends('admin.layouts.master')
@section('dashboard', 'active')

@section('title')
    {{ $data['title'] ?? '' }}
@endsection
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
                            <li class="breadcrumb-item"><a
                                    href="{{ route('admin.dashboard') }}">{{__('messages.common.dashboard')}}</a></li>

                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{$data['users']->count()}}</h3>
                                <p>{{__('messages.common.total_users')}}</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="clearfix hidden-md-up"></div>
            </div>
        </div>
    </div>

@endsection
