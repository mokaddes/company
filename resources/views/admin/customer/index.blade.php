@extends('admin.layouts.master')

@section('customer', 'active')
@section('title') {{ $data['title'] ?? __('messages.common.user') }} @endsection

@push('style')
@endpush
@php
    $localLanguage = Session::get('languageName');
@endphp
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $data['title'] ?? __('messages.common.user') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a
                                    href="{{ route('admin.dashboard') }}">{{ __('messages.common.dashboard') }}</a></li>
                            <li class="breadcrumb-item active">{{ $data['title'] ?? __('messages.common.user') }}</li>
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
                                        <h3 class="card-title">{{ __('messages.common.manage') }}
                                            {{ $data['title'] ?? __('messages.common.user') }} </h3>
                                    </div>
                                    <div class="col-6">
                                        <div class="float-right">
                                            @if (Auth::user()->can('admin.customer.create'))
                                                <a href="{{ route('admin.customer.create') }}"
                                                    class="btn btn-primary btn-gradient btn-sm">{{ __('messages.common.add_new') }}</a>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body table-responsive p-0">
                                 <table id="dataTables" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th width="5%">SN</th>
                                            <th width="10%">{{ __('messages.common.image') }}</th>
                                            <th width="15%">{{ __('messages.common.name') }}</th>
                                            <th width="15%">{{ __('messages.customer.contact_info') }}</th>
                                         
                                            <th width="15%">{{ __('messages.common.plan') }}</th>
                                            <th width="5%">{{ __('messages.common.cards') }}</th>
                                            <th width="10%">{{ __('messages.common.status') }}</th>
                                            <th width="15%">{{ __('messages.common.register_at') }}</th>
                                            <th width="15%">{{ __('messages.common.action') }}</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th width="5%">SN</th>
                                            <th width="10%">{{ __('messages.common.image') }}</th>
                                            <th width="15%">{{ __('messages.common.name') }}</th>
                                            <th width="15%">{{ __('messages.customer.contact_info') }}</th>
                                         
                                            <th width="15%">{{ __('messages.common.plan') }}</th>
                                            <th width="5%">{{ __('messages.common.cards') }}</th>
                                            <th width="10%">{{ __('messages.common.status') }}</th>
                                            <th width="15%">{{ __('messages.common.register_at') }}</th>
                                            <th width="15%">{{ __('messages.common.action') }}</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @if (isset($data['rows']) && count($data['rows']) > 0)
                                            @foreach ($data['rows'] as $key => $row)
                                                @php
                                                    $today = \Carbon\Carbon::today();
                                                    $validDate = \Carbon\Carbon::parse($row->current_pan_valid_date);
                                                    $day = $today->diffInDays($validDate, false);
                                                    $day = $day < 0 ? 0 : $day;
                                                @endphp
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>
                                                        <img src="{{ getProfile($row->image) }}" alt="{{ $row->name }}" title="{{ $row->name }}" height="70" width="70">
                                                    </td>
                                                    <td>{{ $row->name }}</td>
                                                    <td>
                                                         <a href="mailto:{{$row->email}}">{{ $row->email }}</a>
                                                         <a href="tel:{{$row->phone}}">{{ $row->phone ? $row->phone : ''}}</a>
                                                        
                                                    </td>
                                                 
                                                    <td><span>{{ $localLanguage == 'en' ? $row->userPlan->name : $row->userPlan->name_de }}</span>
                                                       <p>{{$day}} {{ __('messages.user_dashboard.days_left') }}</p>
                                                    </td>
                                                    <td>
                                                        @if (Auth::user()->can('admin.card.index'))
                                                        <a href="{{ route('admin.card.index') }}?user_id={{ $row->id }}">{{count($row->card)}}</a>
                                                        @else
                                                        {{count($row->card)}}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($row->status == 1)
                                                            <span class="text-success">{{ __('messages.common.published') }}</span>
                                                        @else
                                                            <span class="text-danger">{{ __('messages.common.unpublished') }}</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div>{{ date('d M, Y', strtotime($row->created_at)) }}</div>
                                                        <div>{{ date('h:i A', strtotime($row->created_at)) }}</div>
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-xs btn-secondary dropdown-toggle btn-sm btn-gradient"
                                                                type="button" data-toggle="dropdown" aria-expanded="false">
                                                                {{ __('messages.common.actions') }}
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                @if (Auth::user()->can('admin.card.index'))
                                                                    <a href="{{route('admin.card.index',['user_id'=>$row->id])}}"
                                                                        class="cards  dropdown-item"
                                                                        data-id="{{ $row->id }}"
                                                                        title="{{__('messages.common.cards')}}"><i class="nav-icon fa fa-address-card"></i>
                                                                        {{ __('messages.common.cards') }}
                                                                    </a>
                                                                @endif
                                                                @if (Auth::user()->can('admin.customer.edit'))
                                                                    <a href="javascript:void(0)"
                                                                        class="pass_change  dropdown-item"
                                                                        data-id="{{ $row->id }}"
                                                                        title="Password Edit"><i class="fa fa-key" aria-hidden="true"></i>
                                                                        {{ __('messages.common.change_password') }}
                                                                    </a>
                                                                @endif
                                                                @if (Auth::user()->can('admin.customer.edit'))
                                                                <a href="javascript:void(0)"
                                                                    class="plan_change  dropdown-item"
                                                                    data-id="{{ $row->id }}"
                                                                    title="Plan Change"><i class="fa fa-money-bill-alt"></i>
                                                                    {{ __('messages.plan.change_plan') }}
                                                                </a>
                                                                @endif
                                                                @if (Auth::user()->can('admin.customer.view'))

                                                                <a href="{{ route('admin.customer.view', $row->id) }}"
                                                                    class="view dropdown-item"><i class="fa fa-eye"></i> {{ __('messages.common.view') }}</a>

                                                                @endif

                                                                @if (Auth::user()->can('admin.customer.edit'))
                                                                    <a href="{{ route('admin.customer.edit', $row->id) }}"
                                                                        class="edit dropdown-item"><i class="fa fa-pencil"></i> {{ __('messages.common.edit') }}</a>
                                                                @endif

                                                                @if (Auth::user()->can('admin.customer.delete'))
                                                                    <a href="{{ route('admin.customer.delete', $row->id) }}"
                                                                        id="deleteData"
                                                                        class="dropdown-item"><i class="fa fa-trash"></i> {{ __('messages.common.delete') }}</a>
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

    {{-- Password edit modal --}}
    <div class="modal fade" id="editPasswordModal" tabindex="-1" aria-labelledby="editPasswordModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPasswordModalLabel">{{ __('messages.common.change_password') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.customer.password.change') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" id="user_id">
                        <div class="form-group">
                            <label for="code" class="form-label">{{__('messages.common.password')}}</label>
                            <div class="input-group input-group-flat">
                                <input type="password" name="password" id="password-field" class="form-control"
                                    placeholder="{{__('messages.placeholder.your_password')}}" autocomplete="off" required>
                                <span class="input-group-text">
                                    <a href="javascript:void(0)"
                                        class="link-secondary fa fa-fw fa-eye field-icon toggle-password"
                                        toggle="#password-field">
                                    </a>
                                </span>
                            </div>
                        </div>
                        <div class="form-group float-right">
                            <button type="button" class="btn btn-danger"
                                data-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                            <button type="submit" class="btn btn-success">{{ __('messages.common.update') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Plan edit modal --}}
    <div class="modal fade" id="editPlanModal" tabindex="-1" aria-labelledby="editPlanModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPlanModalLabel">{{ __('messages.plan.change_plan') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modal-body">

                </div>
            </div>
        </div>
    </div>

@endsection
@push('script')
    <script type="text/javascript">
        $(document).on('click', '.plan_change', function() {
            let user_id = $(this).data('id');
            $.get('/admin/customer/' + user_id + '/plan', function(data) {
                $('#editPlanModal').modal('show');
                $('#modal-body').html(data);
            });
        });

        $(document).on('click', '.pass_change', function() {
            let user_id = $(this).data('id');
            $('#user_id').val(user_id);
            $('#editPasswordModal').modal('show');
        });
        // password show hide
        $(".toggle-password").click(function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    </script>
@endpush
