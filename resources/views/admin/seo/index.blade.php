@extends('admin.layouts.master')

@section('seo', 'active')
@section('title') {{ $data['title'] ?? '' }} @endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{$data['title']}} {{__('messages.common.list')}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{__('messages.common.dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{$data['title']}}</li>
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
                                        <h3 class="card-title">{{__('messages.seo.manage_seo')}}</h3>
                                    </div>

                                </div>
                            </div>

                            <div class="card-body table-responsive p-0">
                                 <table id="dataTables" class="table table-striped">
                                    <thead >
                                        <tr>
                                            <th width="5%">SN</th>
                                            <th>{{__('messages.seo.page_name')}}</th>
                                            <th>{{__('messages.seo.meta_title')}}</th>
                                            <th>{{__('messages.seo.meta_desc')}}</th>
                                            <th width="15%">{{__('messages.common.image')}}</th>
                                            <th width="15%">{{__('messages.common.action')}}</th>
                                        </tr>
                                    </thead>
                                    <tfoot >
                                        <tr>
                                            <th width="5%">SN</th>
                                            <th>{{__('messages.seo.page_name')}}</th>
                                            <th>{{__('messages.seo.meta_title')}}</th>
                                            <th>{{__('messages.seo.meta_desc')}}</th>
                                            <th width="15%">{{__('messages.common.image')}}</th>
                                            <th width="15%">{{__('messages.common.action')}}</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach (($data['rows']) as $key => $row)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>
                                                    {{ $row->page_slug }}
                                                </td>
                                                <td>{{ Str::limit($row->title, 25) }}</td>
                                                <td>
                                                    {{ Str::limit($row->description, 35) }}
                                                </td>
                                                <td>
                                                    <img width="20%" src="{{ getPhoto($row->image) }}" alt="image">
                                                </td>

                                                <td>
                                                  


                                                    <div class="dropdown">
                                                        <button class="btn btn-xs btn-secondary dropdown-toggle btn-sm btn-gradient" type="button"
                                                            data-toggle="dropdown" aria-expanded="false">
                                                            {{__('messages.common.actions')}}
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            @if (Auth::user()->can('admin.seo.view'))
                                                                <a href="javascript:void(0)" class="view dropdown-item" data-id="{{$row->id}}" ><i class="fa fa-eye"></i> {{__('messages.common.view')}}</a>
                                                            @endif
                                                            
                                                            @if (Auth::user()->can('admin.seo.edit'))
                                                                <a href="{{ route('admin.seo.edit', $row->id) }}" class="dropdown-item"><i class="fa fa-pencil"></i> {{__('messages.common.edit')}}</a>
                                                            @endif                                                          

                                                        </div>
                                                    </div>

                                                 
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{-- View modal --}}
<div class="modal fade" id="viewSeoModal" tabindex="-1" aria-labelledby="viewSeoModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewSeoModalLabel">{{__('messages.seo.view_seo_info')}}</h5>
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
    $(document).on('click', '.view', function() {
        let cat_id = $(this).data('id');
        $.get('seo/'+cat_id+'/view', function(data) {
            console.log(data);
            $('#viewSeoModal').modal('show');
            $('#modal_body').html(data);
        });
    });
</script>
@endpush
