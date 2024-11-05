@extends('admin.layouts.master')

@section('contact', 'active')
@section('title') {{ $data['title'] ?? __('messages.common.contact') }} @endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{__('messages.common.contact')}} {{__('messages.common.list')}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{__('messages.common.dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{__('messages.common.contact')}}</li>
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
                                        <h3 class="card-title">{{__('messages.contact.manage_contact')}} </h3>
                                    </div>

                                </div>
                            </div>

                            <div class="card-body table-responsive p-0">
                                 <table id="dataTables" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th width="5%">SN</th>
                                            <th width="10%">{{__('messages.common.name')}}</th>
                                            <th width="10%">{{__('messages.common.email')}}</th>                                        
                                            <th width="15%">{{__('messages.common.message')}}</th>
                                            <th width="10%">{{__('messages.common.date')}}</th>
                                            <th width="10%">{{__('messages.common.action')}}</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th width="5%">SN</th>
                                            <th width="10%">{{__('messages.common.name')}}</th>
                                            <th width="10%">{{__('messages.common.email')}}</th>                                        
                                            <th width="15%">{{__('messages.common.message')}}</th>
                                            <th width="10%">{{__('messages.common.date')}}</th>
                                            <th width="10%">{{__('messages.common.action')}}</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @if (isset($data['rows']) && count($data['rows']) > 0)
                                            @foreach ($data['rows'] as $key => $row)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $row->name }}</td>
                                                    <td><a href="mailto:{{ $row->email }}">{{ $row->email }}</a></td>
                                               
                                                    <td>{{ \Illuminate\Support\Str::limit($row->message,100,"...") }}</td>

                                                    <td>{{ date('d M Y', strtotime($row->created_at)) }}</td>

                                                    </td>
                                                    <td>  
                                                        
                                                        <div class="dropdown">
                                                        <button class="btn btn-xs btn-secondary dropdown-toggle btn-sm btn-gradient" type="button"
                                                            data-toggle="dropdown" aria-expanded="false">
                                                            {{__('messages.common.actions')}}
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            @if (Auth::user()->can('admin.contact.view'))
                                                            <a href="javascript:void(0)" class="dropdown-item view" data-id="{{$row->id}}"><i class="fa fa-eye"></i> {{__('messages.common.view')}}</a>
                                                            @endif

                                                            @if (Auth::user()->can('admin.contact.delete'))
                                                            <a href="{{route('admin.contact.delete', $row->id)}}" id="deleteData" class="dropdown-item"><i class="fa fa-trash"></i> {{__('messages.common.delete')}}</a>
                                                            @endif
                                                        </div>
                                                    </div>


                                                      
                                                    

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

{{-- edit modal --}}
<div class="modal fade" id="viewContactModal" tabindex="-1" aria-labelledby="viewContactModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewContactModalLabel">{{__('messages.contact.view_contact')}}</h5>
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
        $.get('contact/'+cat_id+'/view', function(data) {
            console.log(data);
            $('#viewContactModal').modal('show');
            $('#modal_body').html(data);
        });
    });
</script>
@endpush
