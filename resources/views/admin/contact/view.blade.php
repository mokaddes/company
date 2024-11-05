
@php
$row = $data['row']
@endphp
<div class="card-body table-responsive p-4">
    <table class="table">
        <tr>
            <td>{{__('messages.common.name')}}</td>
            <td>{{ $row->name }}</td>
        </tr>
        <tr>
            <td>{{__('messages.common.email')}}</td>
            <td> <a href="mailto:{{ $row->email }}">{{ $row->email }}</a></td>
        </tr>
        {{-- @if ($row->phone)
        <tr>
            <td>{{__('messages.common.phone')}}</td>
            <td><a href="tel:{{ $row->phone }}">{{ $row->phone }}</a></td>
        </tr>
        @endif --}}
        {{-- <tr>
            <td>{{__('messages.contact.reason_inquiry')}}</td>
            <td>{{ $row->reason }}</td>
        </tr> --}}
        <tr>
            <td>{{__('messages.common.date')}}</td>
            <td>{{ date('d M Y', strtotime($row->created_at)) }}</td>
        </tr>
        <tr>
            <td>{{__('messages.common.message')}}</td>
            <td>{{ $row->message }}</td>
        </tr>
    </table>
</div>

