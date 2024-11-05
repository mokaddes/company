@extends('admin.layouts.master')
@section('title') {{ $data['title'] ?? 'Profile' }} @endsection
@php
    $user = Auth::user();
@endphp
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-md-4 card card-info card-outline">
                    <div class="card-body box-profile position-relative">
                        <a href="{{route('admin.profile.edit')}}" class="position-absolute"
                            style="right: 0; top: 5px;" title="Edit">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                                src="{{getProfile($user->image)}}" alt="{{$user->name}}">
                        </div>
                        <ul class="list-group list-group-unbordered mb-3 mt-3">
                            <li class="list-group-item border-top-0">
                                <b>Name</b> <a class="float-right">{{$user->name}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Email</b> <a class="float-right">{{$user->email}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Role</b> <a class="float-right">
                                    @foreach ($roles as $role)
                                        {{ $user->hasRole($role->name) ? ucfirst($role->name) : '' }}
                                    @endforeach</a>
                            </li>
                            @if(!empty($user->phone))
                            <li class="list-group-item">
                                <b>Phone</b> <a class="float-right">+{{$user->phone}}</a>
                            </li>
                            @endif
                            @if(!empty($user->created_at))
                            <li class="list-group-item">
                                <b>Join At</b> <a class="float-right">{{ date('d M, Y', strtotime($user->created_at)) }}</a>
                            </li>
                            @endif
                           
                        </ul>
                        
                    </div>
                </div>

                

            </div>
        </div>
    </div>
</div>
@endsection
