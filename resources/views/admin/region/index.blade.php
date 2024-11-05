@extends('admin.layouts.master')
@section('location_menu', 'menu-open')
@section('region', 'active')
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
                                            @if (Auth::user()->can('admin.region.create'))
                                                <a href="javascript:void(0)" data-toggle="modal"
                                                    data-target="#addRegionModal" class="btn btn-primary btn-sm">Add New</a>
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
                                            <th width="25%">Region Name</th>
                                            <th width="15%">Code</th>
                                            <th width="15%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($data['rows']) && count($data['rows']) > 0)
                                            @foreach ($data['rows'] as $key => $row)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $row->country->name ?? '' }}</td>
                                                    <td>{{ $row->name }}</td>
                                                    <td>{{ $row->code }}</td>
                                                    <td>
                                                        @if (Auth::user()->can('admin.region.edit'))
                                                            <a href="javascript:void(0)"
                                                                class="btn btn-secondary edit btn-xs"
                                                                data-id="{{ $row->id }}">Edit</a>
                                                        @endif

                                                        @if (Auth::user()->can('admin.region.delete'))
                                                            <a href="{{ route('admin.region.delete', $row->id) }}"
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
    <div class="modal fade" id="addRegionModal" tabindex="-1" aria-labelledby="addRegionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addRegionModalLabel">Add Region</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.region.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="country_id" class="form-label">Country</label><br />
                            <select name="country_id" id="country_id" class="form-control select2">
                                @if (isset($data['country']) && count($data['country']) > 0)
                                    @foreach ($data['country'] as $key => $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-label">Region Name</label>
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Region name" required>
                        </div>
                        <div class="form-group">
                            <label for="code" class="form-label">Code</label>
                            <input type="text" name="code" id="code" class="form-control" placeholder="Code"
                                required>
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
    <div class="modal fade" id="editRegionModal" tabindex="-1" aria-labelledby="editRegionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editRegionModalLabel">Edit Region</h5>
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
            let id = $(this).data('id');
            $.get('region/' + id + '/edit', function(data) {
                console.log(data);
                $('#editRegionModal').modal('show');
                $('#modal_body').html(data);
            });
        });
    </script>
@endpush
