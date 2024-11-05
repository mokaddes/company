@extends('admin.layouts.master')

@section('location_menu', 'menu-open')
@section('country', 'active')
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
                                        <h3 class="card-title">Manage {{ $data['title'] ?? '' }} </h3>
                                    </div>
                                    <div class="col-6">
                                        <div class="float-right">
                                            @if (Auth::user()->can('admin.country.create'))
                                                <a href="javascript:void(0)" data-toggle="modal"
                                                    data-target="#addCountryModal" class="btn btn-primary btn-gradient btn-sm">Add New</a>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body table-responsive p-0">
                                 <table id="dataTables" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th width="5%">SL</th>
                                            <th width="25%">Country Name</th>
                                            <th width="25%">Country Code</th>
                                            <th width="15%">Action</th>
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
                                                        @if (Auth::user()->can('admin.country.edit'))
                                                            <a href="javascript:void(0)"
                                                                class="btn btn-secondary edit btn-xs"
                                                                data-id="{{ $row->id }}">Edit</a>
                                                        @endif

                                                        @if (Auth::user()->can('admin.country.delete'))
                                                            <a href="{{ route('admin.country.delete', $row->id) }}"
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
    <div class="modal fade" id="addCountryModal" tabindex="-1" aria-labelledby="addCountryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCountryModalLabel">Add Country</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.country.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="form-label">Country Name</label>
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Country name" required>
                        </div>

                        <div class="form-group">
                            <label for="code" class="form-label">Country Code</label>
                            <input type="text" name="code" id="code" class="form-control"
                                placeholder="Country code" required>
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
    <div class="modal fade" id="editCountryModal" tabindex="-1" aria-labelledby="editCountryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCountryModalLabel">Edit Country</h5>
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
    <script type="text/javascript">
        $(document).on('click', '.edit', function() {
            let cat_id = $(this).data('id');
            $.get('country/' + cat_id + '/edit', function(data) {
                console.log(data);
                $('#editCountryModal').modal('show');
                $('#modal_body').html(data);
            });
        });
    </script>
@endpush
