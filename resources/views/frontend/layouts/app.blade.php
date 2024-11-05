<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @php
        $settings = getSetting();
    @endphp
    <title>@yield('title')</title>

    {{-- meta info --}}
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Md. Shakib Hossain Rijon, Md. Rabin Mia, Sajjel Hossain">
    <meta property="fb:app_id" content="{{ '100087492087217' }}" />
    <meta name="robots" content="index,follow">
    <meta name="Developed By" content="Arobil Limited" />
    <meta name="Developer" content="Md. Shakib Hossain Rijon" />
    <meta property="og:image:width" content="700" />
    <meta property="og:image:height" content="400" />
    <meta property="og:site_name" content="{{ $settings->site_name ?? 'venmeo' }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">


    @if (View::hasSection('meta'))
        @yield('meta')
    @else
        <meta property="og:title" content="{{ $settings->site_name ?? config('app.name') }} - @yield('title')" />
        <meta property="og:description" content="Welcome to venmeo" />
        <meta property="og:image" content="{{getIcon($settings->site_logo)}}" />
    @endif

    {{-- style  --}}
    @include('frontend.layouts.style')

    {{-- toastr style  --}}
    <link rel="stylesheet" href="{{asset('massage/toastr/toastr.css')}}">

    <style>
    ul.dropdown-menu.p-2.show {
        left: -50px;
        top: 32px;
    }
    .flag {
        width: 25px;
        height: 15px;
        object-fit: contain;
    }
   
    </style>
    {{-- custom style  --}}
    @stack('style')

</head>

<body>

    {{-- header section  --}}
    @include('frontend.layouts.header')

    @if (!request()->routeIs('home'))
        @include('frontend.layouts.breadcrumb')
    @endif
    {{-- content section  --}}
    @yield('content')

    {{-- footer section  --}}
    @include('frontend.layouts.footer')

    {{-- javascript  --}}
    @include('frontend.layouts.script')

    <script src="{{asset('massage/toastr/toastr.js')}}"></script>
        {!! Toastr::message() !!}
    <script>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error('{{ $error }}','Error',{
                    closeButton:true,
                    progressBar:true,
                });
            @endforeach
        @endif
    </script>

    {{-- custom js area  --}}

    @stack('script')

</body>

</html>
