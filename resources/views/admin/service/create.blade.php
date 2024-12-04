@extends('admin.layouts.master')
@push('style')
    <style>
        textarea.form-control{
            height: 100px !important;
        }
    </style>
@endpush
@section('service', 'active')
@section('title')
    {{ $title ?? '' }}
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $title ?? '' }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="">Manage Post</a></li>
                            <li class="breadcrumb-item active">{{ $title ?? '' }}</li>
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
                                        <h3 class="card-title"> {{ $title ?? '' }}</h3>
                                    </div>
                                    <div class="col-6">
                                        <div class="float-right">
                                            <a href="{{ route('admin.work.index') }}"
                                               class="btn btn-primary btn-sm">Back</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body table-responsive p-4">
                                <form action="{{  route('admin.service.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <!-- Icon -->
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="icon" class="form-label">Icon</label>
                                                <input type="file" name="icon" id="icon" value="{{ old('icon') }}" class="form-control" placeholder="Enter icon class (e.g., fas fa-user)" required>
                                            </div>
                                        </div>

                                        <!-- Name -->
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" placeholder="Enter name" required>
                                            </div>
                                        </div>



                                        <!-- Header -->
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="header" class="form-label">Header</label>
                                                <input type="text" name="header" id="header" value="{{ old('header') }}" class="form-control" placeholder="Enter header" required>
                                            </div>
                                        </div>

                                        <!-- Subheader -->
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="subheader" class="form-label">Subheader</label>
                                                <input type="text" name="subheader" id="subheader" value="{{ old('subheader') }}" class="form-control" placeholder="Enter subheader" required>
                                            </div>
                                        </div>
                                        <!-- Status -->
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="status" class="form-label">Status</label>
                                                <select name="status" id="status" class="form-control" required>
                                                    <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                                                    <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- Order Number -->
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="order_number" class="form-label">Order No</label>
                                                <input type="text" name="order_number" id="order_number" value="{{ old('order_number') }}" class="form-control" placeholder="Enter subheader" required>
                                            </div>
                                        </div>
                                        <!-- Color -->
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="color" class="form-label">Color</label>
                                                <input type="color" name="color" id="color" value="{{ old('color') }}" class="form-control" placeholder="Enter color (e.g., #ffffff)" required>
                                            </div>
                                        </div>

                                        <!-- Description -->
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="description" class="form-label">Description</label>
                                                <textarea name="description" id="description" class="form-control" placeholder="Enter description" rows="4" required>{{ old('description') }}</textarea>
                                            </div>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="col-lg-12 text-right">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>


                                </form>
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
