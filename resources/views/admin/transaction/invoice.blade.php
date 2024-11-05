@php
    $setting = getSetting();
    $localLanguage = Session::get('languageName');
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        .container {
            width: 95%;
            margin: 0 auto;
            padding: 20px;
        }
        .header, .footer {
            margin-bottom: 130px;
        }
        .header h1 {
            margin: 0;
            font-size: 2em;
        }
        .header img {
            max-width: 150px;
        }
        .address, .invoice-details {
            display: inline-block;
            vertical-align: top;
            width: 50%;
        }
        .invoice-details {
            text-align: right;
        }
        .invoice-details p {
            margin: 5px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table th, table td {
            padding: 10px;
            text-align: left;
        }
        table {
            border: 1px solid #000;
        }
        table th {
            background-color: #004aad;
            color: #fff;
            text-transform: uppercase;
        }
        .totals {
            width: 270px;
            float: right;
            text-align: right;
            padding-left: 20px;
            padding-right: 20px;
            border: 1px solid #000;
        }

        .footer {
            margin-top: 150px;
            font-weight: 600;
            font-size: 25px;
        }
        .company {
            padding-bottom: 5px;
            padding-left: 10px;
            padding-right: 10px;
            border-bottom: 2px solid;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1 style="float: left; margin-top: 80px; text-transform: uppercase;">{{__('messages.common.invoice')}}</h1>
            <img style="width: 35%; image-rendering: pixelated; float: right;"
                src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path($setting->site_logo))) }}"
                class="img-fluid" alt="Logo">
        </div>
        <div style="margin-bottom: 15px;">            
            <strong class="company">{{__('messages.common.companyy')}} {{ $setting->site_name }}, {{ $setting->office_address }}</strong>
        </div>
        <div class="address" style="float: left;">
            <strong>
                <p style="margin-block: 8px;">{{ $row->user->name ?? '' }}</p>
                @if (!empty($row->user->address))
                    <p style="margin-block: 8px;">{{ $row->user->address }}</p>
                @endif
                @if (!empty($row->user->email))
                <p style="margin-block: 8px;">{{ $row->user->email }}</p>
                @endif
            </strong>
        </div>
        <div class="invoice-details" style="float: right;">
            <p><strong>{{__('messages.order.inv_number')}}:</strong> {{ $row->transaction_number }}</p>
            <p><strong>{{__('messages.common.date')}}:</strong> {{ date('d.m.Y', strtotime($row->pay_date)) }}</p>
            <p><strong>Kunde:</strong> #{{ sprintf('%02d', $row->id) }}</p>
        </div>
        <table style="margin-top: 130px;">
            <thead>
                <tr>
                    <th>{{__('messages.order.sl')}}.</th>
                    <th>{{__('messages.order.description')}}</th>
                    <th>{{__('messages.order.quantity')}}</th>
                    <th>{{__('messages.order.rate')}}</th>
                    <th>{{__('messages.order.total')}}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1.</td>
                    <td class="text-center">
                        {{ $localLanguage == 'en' ? $row->plan->name : $row->plan->name_de }}
                    </td>
                    <td>1</td>
                    {{-- <td class="text-center">
                        {{ $row->plan->day }} {{__('messages.common.days')}}
                    </td> --}}
                    <td class="text-end"> {{ number_format($row->amount,2, ',', '') }} {{getDefaultCurrencySymbol()}}</td>
                    <td class="text-end"> {{ number_format($row->amount,2, ',', '') }} {{getDefaultCurrencySymbol()}}</td>

                </tr>
            </tbody>
        </table>
        <div class="totals">
            @php
                $taxAmount = ($row->amount * $setting->tax) / 100;
                $totalAmount = $row->amount + $taxAmount;
            @endphp
            <p>
                <span style="float: left;">{{__('messages.order.subtotal')}}</span>
                <span>{{ number_format($row->amount, 2, ',', '') }} {{getDefaultCurrencySymbol()}}</span>
            </p>
            <p>
                <span style="float: left;">
                    {{__('messages.order.tax')}}
                    @if($setting->tax > 0)
                        {{ number_format($setting->tax, 2, ',', '') }}%
                    @endif
                </span>
                <span>{{ number_format($taxAmount, 2, ',', '') }} {{getDefaultCurrencySymbol()}}</span>
            </p>
            <p>
                <span style="float: left;"><strong>{{__('messages.order.total')}}:</strong></span>
                <span>{{ number_format($totalAmount, 2, ',', '') }} {{getDefaultCurrencySymbol()}}</span>
            </p>
        </div>
        <div class="footer">
            <p>{{ $localLanguage == 'en' ? $setting->invoice_footer : $setting->invoice_footer_de }}</p>
        </div>
    </div>
</body>
</html>
