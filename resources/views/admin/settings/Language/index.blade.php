@extends('admin.layouts.master')
@section('settings_menu', 'menu-open')
@section('language', 'active')
@section('title') {{ $data['title'] ?? '' }} @endsection
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
                                        <h3 class="card-title">Manage {{ $data['title'] ?? '' }} </h3>
                                    </div>
                                    <div class="col-6">
                                        <div class="float-right">
                                            @if (Auth::user()->can('admin.blog-category.index'))
                                                <a href="javascript:void(0)" data-toggle="modal"
                                                    data-target="#addLanguageModal" class="btn btn-primary btn-sm">Add New</a>
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
                                            <th>Name</th>
                                            <th>Code</th>
                                            <th>Flag</th>
                                            <th>Direction</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($data['rows']) && count($data['rows']) > 0)
                                            @foreach ($data['rows'] as $key => $row)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $row->name }}</td>
                                                    <td>{{ $row->code }}</td>
                                                    <td>
                                                        <span class="flag-icon flag-icon-{{ $row->icon }} flag-icon-squared"></span>
                                                    </td>
                                                    <td>
                                                        {{ $row->direction }}

                                                    </td>
                                                    <td>
                                                        @if (Auth::user()->can('admin.settings.language.edit'))
                                                            <a href="javascript:void(0)"
                                                                class="btn btn-secondary edit btn-xs"
                                                                data-id="{{ $row->id }}">Edit</a>
                                                        @endif

                                                        @if (Auth::user()->can('admin.settings.language.delete'))
                                                            <a href="{{ route('admin.settings.language.delete', $row->id) }}"
                                                                id="deleteData" class="btn btn-danger btn-xs">Delete</a>
                                                        @endif
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

    {{-- create modal --}}
    <div class="modal fade" id="addLanguageModal" tabindex="-1" aria-labelledby="addLanguageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addLanguageModalLabel">Add Language</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.settings.language.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="form-label">Language Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control"
                                placeholder="Language name" required>
                        </div>
                        <div class="form-group">
                            <label for="code" class="form-label">Language Code</label>
                            <input type="text" name="code" id="code" value="{{ old('code') }}" class="form-control"
                                placeholder="Language Code" required>
                        </div>
                        <div class="form-group">
                            <label for="direction" class="form-label">Direction</label>
                            <select name="direction" id="direction" class="form-control">
                                <option value="" class="d-none">--Select Direction--</option>
                                <option value="ltr">ltr</option>
                                <option value="rtl">rtl</option>
                            </select>
                        </div>
                        <div class="form-group float-right">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- edit modal --}}
    <div class="modal fade" id="editLanguageModal" tabindex="-1" aria-labelledby="editLanguageModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editLanguageModalLabel">Edit Language</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="modal_body"></div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('script')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">
    <script type="text/javascript">
        $(document).on('click', '.edit', function() {
            let cat_id = $(this).data('id');
            $.get('language/' + cat_id + '/edit', function(data) {
                console.log(data);
                $('#editLanguageModal').modal('show');
                $('#modal_body').html(data);
            });
        });
    </script>
@endpush
