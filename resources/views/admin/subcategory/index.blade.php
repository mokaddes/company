@extends('admin.layouts.master')

@section('subcategory', 'active')
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
                                            @if (Auth::user()->can('admin.subcategory.index'))
                                                <a href="javascript:void(0)" data-toggle="modal"
                                                    data-target="#addCategoryModal" class="btn btn-primary btn-sm">Add New</a>
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
                                            <th width="25%">Category Name</th>
                                            <th width="25%">Sub Category Name</th>
                                            <th width="15%">Order Number</th>
                                            <th width="15%">Published Status</th>
                                            <th width="15%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($data['rows']) && count($data['rows']) > 0)
                                            @foreach ($data['rows'] as $key => $row)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $row->category->name ?? '' }}</td>
                                                    <td>{{ $row->name }}</td>
                                                    <td>{{ $row->order_number }}</td>
                                                    <td>
                                                        @if ($row->status == 1)
                                                            <span class="badge badge-success">Published</span>
                                                        @else
                                                            <span class="badge badge-danger">Unpublished</span>
                                                        @endif

                                                    </td>
                                                    <td>
                                                        @if (Auth::user()->can('admin.subcategory.edit'))
                                                            <a href="javascript:void(0)"
                                                                class="btn btn-secondary edit btn-xs"
                                                                data-id="{{ $row->id }}">Edit</a>
                                                        @endif

                                                        @if (Auth::user()->can('admin.subcategory.delete'))
                                                            <a href="{{ route('admin.subcategory.delete', $row->id) }}"
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
    <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCategoryModalLabel">Add Sub Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.subcategory.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="category_id" class="form-label">Select Category </label>
                            <select type="text" name="category_id" id="category_id" class="form-control select2" required
                                style="width: 100%">
                                @if (isset($data['categories']) && count($data['categories']) > 0)
                                    @foreach ($data['categories'] as $key => $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="name" class="form-label">Sub Category Name</label>
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Category name" required>
                        </div>
                        <div class="form-group">
                            <label for="order_number" class="form-label">Order Number</label>
                            <input type="number" name="order_number" id="order_number" class="form-control"
                                placeholder="Order Number" required>
                        </div>
                        <div class="form-group">
                            <label for="status" class="form-label">Published Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>
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
    <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCategoryModalLabel">Edit Sub Category</h5>
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
            $.get('subcategory/' + cat_id + '/edit', function(data) {
                console.log(data);
                $('#editCategoryModal').modal('show');
                $('#modal_body').html(data);
            });
        });
    </script>
@endpush
