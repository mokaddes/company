@extends('admin.layouts.master')
@section('dashboard', 'active')

@section('title')
    {{ $title ?? '' }}
@endsection
@push('style')
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endpush
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $title ?? __('messages.common.dashboard') }}</h1>
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
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $total_contacts }}</h3>
                                <p>Total Contacts</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="{{ route('admin.contact.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $total_blogs }}</h3>
                                <p>Total Blogs</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="{{ route('admin.blog-post.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-secondary">
                            <div class="inner">
                                <h3>{{ $total_services }}</h3>
                                <p>Total Service</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-ios-home"></i>
                            </div>
                            <a href="{{ route('admin.service.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-primary">
                            <div class="inner">
                                <h3>{{ $total_works }}</h3>
                                <p>Total Works</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-compass"></i>
                            </div>
                            <a href="{{ route('admin.work.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                </div>
                <div class="clearfix hidden-md-up"></div>
            </div>
        </div>
    </div>

@endsection
