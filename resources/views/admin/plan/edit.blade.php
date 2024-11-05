@extends('admin.layouts.master')
@section('plan', 'active')

@section('title') {{ $title ?? '' }} @endsection
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $title ?? __('messages.plan.edit_plan') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{__('messages.common.dashboard')}}</a></li>
                            <li class="breadcrumb-item active">{{__('messages.plan.edit_plan')}}</li>
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
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="">
                                        <h4 class="card-title">{{ $title ?? __('messages.plan.edit_plan') }}</h4>
                                    </div>
                                    <div class="">
                                        <a href="{{ route('admin.plan.index') }}" class="btn btn-sm btn-primary btn-gradient">{{__('messages.common.back')}}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('admin.plan.update', $row->id) }}">
                                    @csrf
                                    <div class="row d-flex align-items-center justify-content-center">
                                        <div class="col-xl-6">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="" class="form-label">{{__('messages.plan.plan_name')}} (English)<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" name="name" id="" placeholder="{{__('messages.plan.plan_name')}}"
                                                            class="form-control" value="{{$row->name}}" required>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="" class="form-label">{{__('messages.plan.plan_name')}} (German)<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" name="name_de" id="" placeholder="{{__('messages.plan.plan_name')}}"
                                                            class="form-control" value="{{$row->name_de}}" required>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="" class="form-label">{{__('messages.plan.no_of_vcards')}} <span
                                                                class="text-danger">*</span></label>
                                                        <input type="number" name="no_of_vcards" id="" placeholder="{{__('messages.plan.no_of_vcards')}}"
                                                            class="form-control" value="{{$row->no_of_vcards}}" required>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="" class="form-label">{{__('messages.common.currency')}} <span
                                                                class="text-danger">*</span></label>
                                                        <select name="currency_id" id="" class="form-control"
                                                            required>
                                                            <option value="" class="d-none">{{__('messages.common.select')}}</option>
                                                            @foreach ($currency as $data)
                                                                <option value="{{$data->id}}" {{$row->currency_id == $data->id ? 'selected' : ''}}>
                                                                    {{$data->symbol}}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="" class="form-label">{{__('messages.plan.plan_price')}} <span
                                                                class="text-danger">*</span></label>
                                                        <input type="number" step="0.01" name="price" id="" placeholder="{{__('messages.plan.plan_price')}}"
                                                            class="form-control" value="{{$row->price}}" required>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="" class="form-label">{{__('messages.plan.plan_type')}} <span
                                                                class="text-danger">*</span></label>
                                                        <select name="frequency" id="" class="form-control"
                                                            required>
                                                            <option value="" class="d-none">{{__('messages.common.select')}}</option>
                                                            <option value="1" {{$row->frequency == '1' ? 'selected' : ''}}>{{__('messages.plan.monthly')}}</option>
                                                            <option value="2" {{$row->frequency == '2' ? 'selected' : ''}}>{{__('messages.plan.yearly')}}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="" class="form-label">{{__('messages.common.days')}} <span
                                                                class="text-danger">*</span></label>
                                                        <input type="number" name="day" id="" placeholder="{{__('messages.common.no_of_days')}}"
                                                            class="form-control" value="{{$row->day}}" required>
                                                    </div>
                                                </div>
                                                {{-- <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="" class="form-label">{{__('messages.common.digital_wallet')}}</label>
                                                        <select name="digital_wallet" id="" class="form-control"
                                                            required>
                                                            <option value="" class="d-none">{{__('messages.common.select')}}</option>
                                                            <option value="1" {{$row->digital_wallet == '1' ? 'selected' : ''}}>{{__('messages.common.yess')}}</option>
                                                            <option value="0" {{$row->digital_wallet == '0' ? 'selected' : ''}}>{{__('messages.common.noo')}}</option>
                                                        </select>
                                                    </div>
                                                </div> --}}
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="" class="form-label">{{__('messages.common.self_branding')}}</label>
                                                        <select name="self_branding" id="" class="form-control"
                                                            required>
                                                            <option value="" class="d-none">{{__('messages.common.select')}}</option>
                                                            <option value="1" {{$row->self_branding == '1' ? 'selected' : ''}}>{{__('messages.common.yess')}}</option>
                                                            <option value="0" {{$row->self_branding == '0' ? 'selected' : ''}}>{{__('messages.common.noo')}}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                {{-- <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="" class="form-label">{{__('messages.common.analytics')}}</label>
                                                        <select name="analytics" id="" class="form-control"
                                                            required>
                                                            <option value="" class="d-none">{{__('messages.common.select')}}</option>
                                                            <option value="1" {{$row->analytics == '1' ? 'selected' : ''}}>{{__('messages.common.yess')}}</option>
                                                            <option value="0" {{$row->analytics == '0' ? 'selected' : ''}}>{{__('messages.common.noo')}}</option>
                                                        </select>
                                                    </div>
                                                </div> --}}
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="" class="form-label">{{__('messages.plan.order_number')}}</label>
                                                        <input type="number" name="order_number" id="" placeholder="{{__('messages.plan.order_number')}}"
                                                            class="form-control" value="{{$row->order_number}}">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="" class="form-label">{{__('messages.common.status')}}</label>
                                                        <select name="status" id="" class="form-control">
                                                            <option value="1" {{$row->status == '1' ? 'selected' : ''}}>{{__('messages.common.active')}}</option>
                                                            <option value="0" {{$row->status == '0' ? 'selected' : ''}}>{{__('messages.common.deactive')}}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="" class="form-label">{{__('messages.common.background_colour')}} <span
                                                                class="text-danger">*</span></label>
                                                        <input type="color" name="bg_color" id="" placeholder="{{__('messages.common.no_of_days')}}"
                                                            class="form-control" value="{{ $row->bg_color ?? '#ffffff' }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group" id="oldFeature">
                                                        @foreach ($features as $feature)
                                                        <div class="row d-flex externalField mb-3">
                                                            <div class="col-6">
                                                                <label for="" class="form-label">{{__('messages.plan.feature')}} (English)</label>
                                                                <input type="text" name="feature_name[]" id="feature_name" value="{{$feature->feature_name}}"
                                                                    class="form-control" placeholder="{{__('messages.plan.feature')}}" required>
                                                            </div>
                                                            <div class="col-6">
                                                                <label for="" class="form-label w-100 d-flex justify-content-between align-items-center" style="margin-top: 2.5px;">
                                                                    <span>{{__('messages.plan.feature')}} (German) </span>
                                                                        <button type="button" class="removeOldFeature btn rounded-0 border-0 btn-danger btn-sm py-0 px-2">
                                                                            <i class="fa fa-times"></i>
                                                                        </button>
                                                                </label>
                                                                <input type="text" name="feature_name_de[]" id="feature_name_de" value="{{$feature->feature_name_de}}"
                                                                    class="form-control" placeholder="{{__('messages.plan.feature')}}" required>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                        <div class="text-right mt-1">
                                                            <button type="button"
                                                                class="addMoreFeature btn btn-xs btn-primary">{{__('messages.plan.add_more_feature')}}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="">
                                                <div id="plan_field" class="row"></div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mt-4 text-center">
                                                    <button type="submit" class="btn btn-success">{{__('messages.common.update')}}</button>
                                                </div>
                                            </div>
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
<script>
    $(document).ready(function() {
        $('body').on('click', '.addMoreFeature', function() {
            var input = `
                <div class="col-12 externalField">
                    <div class="form-group">
                        <div class="row d-flex">
                            <div class="col-6">
                                <label for="" class="form-label">{{__('messages.plan.feature')}} (English)</label>
                                <input type="text" name="feature_name[]" id="feature_name" required
                                    class="form-control" placeholder="{{__('messages.plan.feature')}}">
                            </div>
                            <div class="col-6">
                                <label for="" class="form-label w-100 d-flex justify-content-between align-items-center" style="margin-top: 2.5px;">
                                    <span>{{__('messages.plan.feature')}} (German) </span>
                                        <button type="button" class="removeFeature btn rounded-0 border-0 btn-danger btn-sm py-0 px-2">
                                            <i class="fa fa-times"></i>
                                        </button>
                                </label>
                                <input type="text" name="feature_name_de[]" id="feature_name_de" required
                                    class="form-control" placeholder="{{__('messages.plan.feature')}}">
                            </div>
                        </div>

                    </div>
                </div>
                `;
            $('#plan_field').append(input);
        });
        $('#plan_field').on('click', '.removeFeature', function() {
            $(this).closest('.externalField').remove();
        });

        $('#oldFeature').on('click', '.removeOldFeature', function() {
            $(this).closest('.externalField').remove();
        });
    });
</script>
@endpush
