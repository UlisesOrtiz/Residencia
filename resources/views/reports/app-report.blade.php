<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('img/favicon.ico') }}" />

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <title> @yield('title') </title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    @stack('alpine-plugins')
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <!-- AdminLTE Template Styles -->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('template/adminlte')}}/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet"
        href="{{asset('template/adminlte')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{asset('template/adminlte')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{asset('template/adminlte')}}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('template/adminlte')}}/css/adminlte.min.css">


    <style>
        .p-2.img-fluid {
            width: 190px;
            height: 70px;
        }

        .verticaltext {
            width: 1px;
            word-wrap: break-word;
            white-space: pre-wrap;
        }

        @media print {
            .buttonPrint {
                visibility: hidden;
                display: none;
            }

            .border-gray-200.bg-gray-800.text-xs.leading-4.font-medium.text-white,
            tr.border-gray-200.bg-gray-800.text-xs.leading-4.font-medium.text-white th,
            .border-gray-200.bg-gray-800.text-md.text-center.font-medium.text-white{
                --tw-border-opacity: 1 !important;
                border-color: rgb(229 231 235 / var(--tw-border-opacity)) !important;
                --tw-bg-opacity: 1 !important;
                background-color: rgb(31 41 55 / var(--tw-bg-opacity)) !important;
                color: white !important;
                -webkit-print-color-adjust: exact;
            }

            .table-striped tbody tr:nth-of-type(odd) td {
                background-color: rgba(0, 0, 0, .05) !important;
                -webkit-print-color-adjust: exact;
            }

            .table-bordered td,
            .table-bordered th {
                border: 1px solid #dee2e6 !important;
                -webkit-print-color-adjust: exact;
            }
        }
    </style>

    @yield('css')

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <button type="button" class="btn btn-primary float-right buttonPrint mt-2 mr-2"
            onclick="window.print()">IMPRIMIR REPORTE</button>
        <!-- Page Content -->
        <div class="container-fluid">
            @yield('container')
        </div>

        @yield('footer')
        <!-- /.container-fluid -->
    </div>
    <!-- ./wrapper -->

    @stack('modals')
    @livewireScripts

    <!-- AdminLTE Template Scripts -->

    <!-- jQuery -->
    <script src="{{asset('template/adminlte')}}/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('template/adminlte')}}/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('template/adminlte')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Sparkline -->
    <script src="{{asset('template/adminlte')}}/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="{{asset('template/adminlte')}}/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="{{asset('template/adminlte')}}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
</body>

</html>