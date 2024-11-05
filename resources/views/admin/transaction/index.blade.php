@extends('admin.layouts.master')
@section('transaction', 'active')

@section('title') {{ $title ?? '' }} @endsection

@php
    $localLanguage = Session::get('languageName');
@endphp
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $title }} {{ __('messages.common.list') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a
                                    href="{{ route('admin.dashboard') }}">{{ __('messages.common.dashboard') }}</a></li>
                            <li class="breadcrumb-item active">{{ $title }}</li>
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
                                <h4 class="card-title">{{ $title ?? __('messages.transaction.all_transaction') }}</h4>
                            </div>
                            <div class="card-body p-0 table-responsive">
                                 <table id="dataTables" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>{{ __('messages.transaction.trans_id') }}</th>
                                            <th>{{ __('messages.transaction.customer_name') }}</th>
                                            <th>{{__('messages.transaction.plan_name')}}</th>
                                            <th>{{ __('messages.transaction.payment_gateway') }}</th>
                                            <th>{{ __('messages.common.amount') }}</th>
                                            <th>{{__('messages.transaction.transactions_date')}}</th>
                                            <th>{{ __('messages.common.status') }}</th>
                                            <th>{{ __('messages.common.actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>SN</th>
                                            <th>{{ __('messages.transaction.trans_id') }}</th>
                                            <th>{{ __('messages.transaction.customer_name') }}</th>
                                            <th>{{__('messages.transaction.plan_name')}}</th>
                                            <th>{{ __('messages.transaction.payment_gateway') }}</th>
                                            <th>{{ __('messages.common.amount') }}</th>
                                            <th>{{__('messages.transaction.transactions_date')}}</th>
                                            <th>{{ __('messages.common.status') }}</th>
                                            <th>{{ __('messages.common.actions') }}</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($transactions as $item)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$item->transaction_number}}</td>
                                                <td>
                                                    @if (Auth::user()->can('admin.customer.view'))
                                                    <a class="text-capitalize" href="{{route('admin.customer.view', $item->user_id)}}">{{$item->user->name}}</a>
                                                    @else 
                                                    <a class="text-capitalize" href="#">{{$item->user->name}}</a>
                                                    @endif
                                                </td>
                                                <td>{{ $localLanguage == 'en' ? $item->plan->name : $item->plan->name_de}}</td>
                                                <td>{{$item->payment_method}}</td>
                                                <td>{{ number_format($item->amount, 2, ',', '') }} {{getDefaultCurrencySymbol()}}</td>
                                                <td>
                                                    {{date('d F, Y',strtotime($item->pay_date))}}
                                                    
                                                
                                                </td>
                                                <td>
                                                    @if ($item->status == '1')
                                                    <span class="text-success">{{__('messages.common.paid')}}</span>
                                                    @else
                                                    <span class="text-warning">{{__('messages.common.due')}}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{route('admin.transaction.invoice', $item->id)}}"
                                                        class="btn btn-xs btn-primary btn-gradient">{{ __('messages.common.invoice') }}
                                                        <i class="fa fa-download"></i></a>
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
@endsection
