<!DOCTYPE html>
<html lang="en">
@php
    //website settings
    $setting = getSetting();
@endphp

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1, initial-scale=1, maximum-scale=1, user-scalable=0" />
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ $setting->favicon }}" />
    {{-- admin not allow for robots --}}
    <meta name="robots" content="noindex, nofollow">

    <title>@yield('title') - {{ config('app.name', 'Venmeo.de') }}</title>

    {{-- style --}}
    @include('admin.layouts.style')

    {{-- toastr style --}}
    <link rel="stylesheet" href="{{ asset('massage/toastr/toastr.css') }}">
    {{-- custom style --}}
    <style>
        .select2-container--default .select2-selection--single {
            height: 46px !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 36px !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 44px !important;
        }
        ul.dropdown-menu.p-2.show {
            left: -50px !important;
            top: 32px;
        }
        .flag {
            width: 25px;
            height: 15px;
            object-fit: contain;
        }
        .buttons-copy {
            margin-left: 10px !important;
        }
        .buttons-html5 {
            background: linear-gradient(105deg, #5de0e6, #306ab7) !important;
            margin-right: 10px !important;
            margin-block: 5px !important;
            border: 1px solid #a5e4ff !important;
            border-radius: 4px !important;
        }
        .buttons-print {
            margin-block: 5px !important;
            background: linear-gradient(105deg, #5de0e6, #306ab7) !important;
            border: 1px solid #a5e4ff !important;
            border-radius: 4px !important;
        }
    </style>

    @stack('style')
    <link href="https://adminlte.io/themes/v3/plugins/summernote/summernote-bs4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        {{-- header area --}}
        @include('admin.layouts.header',['setting' => $setting] )
        {{-- sidebar area --}}
        @include('admin.layouts.sidebar')
        {{-- main content --}}
        @yield('content')
        {{-- footer --}}
        @include('admin.layouts.footer')

        {{-- javascript --}}
        @include('admin.layouts.script')

    </div>
    {{-- toastr javascript --}}
    <script src="{{ asset('massage/toastr/toastr.js') }}"></script>
    {!! Toastr::message() !!}
    <script>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error('{{ $error }}', 'Error', {
                    closeButton: true,
                    progressBar: true,
                });
            @endforeach
        @endif
    </script>

    <script>
        var dataTables_info = "{{__('messages.datatables.showing')}} _START_ {{__('messages.datatables.to')}} _END_ {{__('messages.datatables.of')}} _TOTAL_ {{__('messages.datatables.entries')}}";
        var dataTables_length = "{{__('messages.datatables.show')}} _MENU_ {{__('messages.datatables.entries')}}";
        var paginate_button_previous = "{{__('messages.datatables.previous')}}";
        var paginate_button_next = "{{__('messages.datatables.next')}}";
        var dataTables_filter = "{{__('messages.datatables.search')}}:";
        var dataTables_copy_btn = "{{__('messages.datatables.copy')}}";
        var dataTables_print_btn = "{{__('messages.datatables.print')}}";

        // Initialize DataTable with language settings and additional configurations
        $(function () {
            $("#dataTables").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "language": {
                    "info": dataTables_info,
                    "lengthMenu": dataTables_length,
                    "paginate": {
                        "previous": paginate_button_previous,
                        "next": paginate_button_next
                    },
                    "search": dataTables_filter
                },
                "buttons":  [
                                {
                                    extend: 'copy',
                                    text: dataTables_copy_btn,
                                    exportOptions: {
                                        columns: ':not(:last-child)'
                                    }

                                },
                                {
                                    extend: 'csv',
                                    exportOptions: {
                                        columns: ':not(:last-child)'
                                    }
                                },
                                {
                                    extend: 'excel',
                                    exportOptions: {
                                        columns: ':not(:last-child)'
                                    }
                                },
                                {
                                    extend: 'pdf',
                                    exportOptions: {
                                        columns: ':not(:last-child)'
                                    }
                                },
                                {
                                    extend: 'print',
                                    text: dataTables_print_btn,
                                    exportOptions: {
                                        columns: ':not(:last-child)'
                                    }
                                },
                ]
            }).buttons().container().appendTo('#dataTables_wrapper .col-md-6:eq(0)');
        });
    </script>

    {{-- delete sweetalert2 --}}
    <script>
        $(document).on("click", "#deleteData", function(e) {
            e.preventDefault();
            var link = $(this).attr("href");
            Swal.fire({
                title: "{{__('messages.common.want_to_delete')}}",
                text: "{{__('messages.common.permanently_delete')}}",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#8bc34a',
                cancelButtonColor: '#d33',
                cancelButtonText: "{{__('messages.common.cancel')}}",
                confirmButtonText: "{{__('messages.common.yes_delete')}}",
            }).then((willDelete) => {
                if (willDelete.isConfirmed) {
                    window.location.href = link;
                }
            })
        })
    </script>

    {{-- summernote --}}
    <script>
        $('.summernote').summernote({
            height: 200,
        })
        $('.select2').select2()
    </script>

    {{-- custom js area --}}
    @stack('script')

</body>

</html>
