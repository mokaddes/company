@extends('admin.layouts.master')

@section('testimonial', 'active')
@section('title') {{ $data['title'] ?? '' }} @endsection

@push('style')

@endpush
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
                                    <h3 class="card-title"> {{ __('messages.testimonial.testimonial_view') }}</h3>
                                </div>
                                <div class="col-6">
                                    <div class="float-right">
                                        <a href="{{ route('admin.testimonial.index') }}"
                                            class="btn btn-primary btn-gradient btn-sm">{{ __('messages.common.back') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body p-0 table-responsive p-4">
                            <table class="table">
                                <tr>
                                    <td style="width:10%;">{{__('messages.common.image')}} :</td>
                                    <td><img src="{{ getProfile($testimonial->image) }}" width="100" alt=""></td>
                                </tr>
                                <tr>
                                    <td>{{__('messages.common.name')}} : </td>
                                    <td>{{ $testimonial->name }}</td>
                                </tr>
                                <tr>
                                    <td>{{__('messages.common.message')}}(en) : </td>
                                    <td>{{$testimonial->details}}</td>
                                </tr>

                                    <tr>
                                        <td>{{__('messages.common.message')}}(ger)  : </td>
                                        <td> {{$testimonial->details_de}}</td>
                                    </tr>

                                <tr>
                                    <td>{{__('messages.common.status')}} :</td>
                                    <td>
                                        @if ($testimonial->status == 1)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Active</span>
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
@push('script')

@endpush



