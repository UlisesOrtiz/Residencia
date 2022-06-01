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

    <title>{{ config('app.name') }} | {{ $title }}</title>

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
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{asset('template/adminlte')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('template/adminlte')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('template/adminlte')}}/plugins/jqvmap/jqvmap.min.css">
    <!-- DataTables -->
    <link rel="stylesheet"
        href="{{asset('template/adminlte')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{asset('template/adminlte')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{asset('template/adminlte')}}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('template/adminlte')}}/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet"
        href="{{asset('template/adminlte')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('template/adminlte')}}/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('template/adminlte')}}/plugins/summernote/summernote-bs4.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet"
        href="{{asset('template/adminlte')}}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset('template/adminlte')}}/plugins/toastr/toastr.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('template/adminlte')}}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{asset('template/adminlte')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <style>
        /* .select2-selection.select2-selection,
        .select2-selection.select2-selection--multiple {
            height: 38px !important;

            span {
                padding-top: 4px;
            }
        } */
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        @include('layouts.partials.preloader')

        <!-- Navbar -->
        @include('layouts.partials.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @switch(Auth::user()->role)
        @case('ADMINISTRADOR') @livewire('layout.admin.sidebar') @break

        @case('FINANCIERO') @livewire('layout.financial.sidebar') @break

        @case('ORIENTACION') @livewire('layout.orientation.sidebar') @break
        
        @case('DOCENTE') @livewire('layout.teacher.sidebar') @break
        
        @case('ESTUDIANTE') @livewire('layout.student.sidebar') @break

        @default @include('layouts.partials.sidebar') @break

        @endswitch


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            @include('layouts.partials.header')
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <!-- Page Content -->
                <div class="container-fluid">
                    {{ $slot }}
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        @include('layouts.partials.footer')

    </div>
    <!-- ./wrapper -->

    <div id="backdrop" class="modal-backdrop fade show" style="display: none"></div>

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
    <!-- SweetAlert2 -->
    <script src="{{asset('template/adminlte')}}/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="{{asset('template/adminlte')}}/plugins/toastr/toastr.min.js"></script>
    <!-- Sparkline -->
    <script src="{{asset('template/adminlte')}}/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="{{asset('template/adminlte')}}/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="{{asset('template/adminlte')}}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset('template/adminlte')}}/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="{{asset('template/adminlte')}}/plugins/moment/moment.min.js"></script>
    <script src="{{asset('template/adminlte')}}/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{asset('template/adminlte')}}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{asset('template/adminlte')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{asset('template/adminlte')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{asset('template/adminlte')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{asset('template/adminlte')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{asset('template/adminlte')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{asset('template/adminlte')}}/plugins/jszip/jszip.min.js"></script>
    <script src="{{asset('template/adminlte')}}/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{asset('template/adminlte')}}/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{asset('template/adminlte')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{asset('template/adminlte')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{asset('template/adminlte')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{asset('template/adminlte')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
    </script>
    <!-- Summernote -->
    <script src="{{asset('template/adminlte')}}/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset('template/adminlte')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js">
    </script>
    <!-- AdminLTE App -->
    <script src="{{asset('template/adminlte')}}/js/adminlte.js"></script>
    <!-- Select2 -->
    <script src="{{asset('template/adminlte')}}/plugins/select2/js/select2.min.js"></script>
    <script src="{{asset('template/adminlte')}}/plugins/select2/js/select2.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
                // Event for message
                window.addEventListener('message', event => {
                    const type = event.detail.type;
                    const message = event.detail.message;
    
                    switch(type){
                        case 'success':
                            toastr.success(message);
                            break;
                        case 'error':
                            toastr.error(message);
                            break;
                        case 'info':
                            toastr.info(message);
                            break;
                        case 'warning':
                            toastr.warning(message);
                            break;                                                                  
                    }
                    
                })
    
                // Event for message confirmation
                window.addEventListener('confirmation', async (event) => {
                   const result = await Swal.fire({
                    title: '¿Estás seguro?',
                    text: `Se eliminará el registro ${event.detail.name}`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Cancelar',
                    confirmButtonText: 'Sí eliminar!'
                    })

                    if(result.isConfirmed){
                        Livewire.emit(event.detail.event, event.detail.id);
                    }
                })

                window.addEventListener('subjectConfirmation', async (event) => {
                    const result = await Swal.fire({
                    title: 'Existen registros',
                    text: event.detail.message,
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Cancelar',
                    confirmButtonText: 'Sí agregar!'
                    });

                    if(result.isConfirmed){
                        Livewire.emit(event.detail.event);
                    }
                })


                // Event for message promotion confirmation
                window.addEventListener('promotionConfirmation', async (event) => {
                   const result = await Swal.fire({
                    title: '¿Estás seguro de promover?',
                    text: `Se promoverán estos alumnos de ${event.detail.section} a ${event.detail.sectionPromotion}.`,
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Cancelar',
                    confirmButtonText: 'Sí promover!'
                    });
                    
                    if(result.isConfirmed){
                        Livewire.emit(event.detail.event);
                    }
                })

                // Event for message promotion confirmation
                window.addEventListener('clearSelect2', async (event) => {
                    $(`#${event.detail.id}`).val(null).trigger("change");
                })

                window.addEventListener('openModal', async (event) => {
                    if(event.detail.modal){
                        $(document.body).addClass('modal-open');
                        $("#backdrop").css("display", "inline-block");
                    }
                    else {
                        $(document.body).removeClass('modal-open');
                        $("#backdrop").css("display", "none");
                    }
                })

                $('.select2-class').select2({
                    placeholder: 'Seleccione una opción',
                });
                
            })
    </script>

    {{-- Own scripts --}}
    @yield('scripts')
</body>

</html>