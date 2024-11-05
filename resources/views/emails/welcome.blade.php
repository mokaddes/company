@component('mail::message')
@php
$settings = DB::table('settings')->first();
@endphp
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => url('/')])
<img src="{{ asset($settings->site_logo) }}" alt="{{config('app.name')}}">
@endcomponent
@endslot

{{-- Greeting --}}
<h1 style="text-align: center">{{ $header }}</h1>

{{-- Intro Lines --}}
Hi, {{ $name }}!

{{-- Body --}}
{{ $body }}

{{-- Action Button --}}
@component('mail::button', ['url' => $actionURL])
{{ $actionText }}
@endcomponent

{{-- Salutation --}}
Regards,<br>
{{ config('app.name') }}

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
© {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
@endcomponent
@endslot
@endcomponent
