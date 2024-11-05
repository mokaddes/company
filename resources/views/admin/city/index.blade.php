@extends('admin.layouts.master')
@section('location_menu', 'menu-open')
@section('city', 'active')
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
                                            @if (Auth::user()->can('admin.category.create'))
                                                <a href="javascript:void(0)" data-toggle="modal" data-target="#addCityModal"
                                                    class="btn btn-primary btn-sm">Add New</a>
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
                                            <th width="15%">Region Name</th>
                                            <th width="15%">City Name</th>
                                            <th width="15%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($data['rows']) && count($data['rows']) > 0)
                                            @foreach ($data['rows'] as $key => $row)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $row->country->name }}</td>
                                                    <td>{{ $row->region->name }}</td>
                                                    <td>{{ $row->name }}</td>
                                                    <td>
                                                        @if (Auth::user()->can('admin.city.edit'))
                                                            <a href="javascript:void(0)"
                                                                class="btn btn-secondary edit btn-xs"
                                                                data-id="{{ $row->id }}">Edit</a>
                                                        @endif

                                                        @if (Auth::user()->can('admin.city.delete'))
                                                            <a href="{{ route('admin.city.delete', $row->id) }}"
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
    <div class="modal fade" id="addCityModal" tabindex="-1" aria-labelledby="addCityModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCityModalLabel">Add City</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.city.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="country_id" class="form-label">Country</label><br />
                            <select name="country_id" id="country_id" class="form-control select2" required>
                                <option value="" class="d-none">--Select Country--</option>
                                @if (isset($data['country']) && count($data['country']) > 0)
                                    @foreach ($data['country'] as $key => $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="region_id" class="form-label">Region</label><br />
                            <select name="region_id" id="region_id" class="form-control" required>
                                <option value="" class="d-none">--Select Region--</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-label">City Name</label><br />
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ old('name') }}" required>
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
    <div class="modal fade" id="editCityModal" tabindex="-1" aria-labelledby="editCityModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCityModalLabel">Edit Category</h5>
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
    {{-- edit modal --}}
    <script type="text/javascript">
        $(document).on('click', '.edit', function() {
            let cat_id = $(this).data('id');
            $.get('city/' + cat_id + '/edit', function(data) {
                console.log(data);
                $('#editCityModal').modal('show');
                $('#modal_body').html(data);
            });
        });
    </script>

    {{-- show region --}}
    <script type="text/javascript">
        $("document").ready(function() {
            $('select[name="country_id"]').on('change', function() {
                var countryId = $(this).val();
                if (countryId) {
                    $.ajax({
                        url: "{{ route('admin.city.countrywise.region') }}/" + countryId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="region_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="region_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .name + '</option>');
                            })
                        }
                    })
                } else {
                    $('select[name="region_id"]').empty();
                }
            });
        });
    </script>
@endpush
