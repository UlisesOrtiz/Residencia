<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{ asset('img/favicon.ico') }}" />
    <title>Sistema Integral Información | CETIS 87</title>

    <!-- Fonts and icons -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <link href="{{ asset('template/argon/css/font-awesome.css') }}" rel="stylesheet" />
    <link href="{{ asset('template/argon/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="{{ asset('template/argon/css/argon-design-system.css?v=1.2.2') }}" rel="stylesheet" />
    <!-- Line Icons -->
    <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet" />
    <style>
        .hero-cetis {
            background: url('{{ asset('img/cetis/9.jpg') }}');
            background-size: 100% auto;
            background-repeat: no-repeat;
            object-fit: cover;
        }

        @media only screen and (max-width:765px) {
            .hero-cetis {
                background-size: 100% 100%;
            }
        }
    </style>
</head>

<body class="index-page">
    <!-- Navbar -->
    <nav id="navbar-main"
        class="navbar navbar-main navbar-expand-lg bg-white navbar-light position-sticky top-0 shadow py-2">
        <div class="container">
            <a class="navbar-brand mr-lg-5" href="{{ route('welcome') }}">
                <img src="{{ asset('img/cetis/brand.png') }}" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global"
                aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbar_global">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="{{ route('welcome') }}">
                                <img src="{{ asset('img/cetis/brand.png') }}" />
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse"
                                data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>

                <ul class="navbar-nav align-items-lg-center ml-lg-auto">
                    @auth
                    <li class="nav-item">
                        <a class="btn btn-outline-default" href="{{ route('verified.user') }}">
                            <span class="nav-link-inner--text">Tablero</span>
                        </a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="btn btn-outline-default" href="{{ route('login') }}">
                            <span class="nav-link-inner--text">Iniciar Sesión</span>
                        </a>
                    </li>
                    @endauth

                    <li class="nav-item">
                        <a class="nav-link nav-link-icon"
                            href="https://www.facebook.com/CETis-87-Linces-Delicias-591239954237748/" target="_blank"
                            data-toggle="tooltip" title="Facebook Oficial">
                            <i class="lni lni-facebook-original"></i>
                            <span class="nav-link-inner--text d-lg-none">Facebook</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="http://www.cetis87.edu.mx/" target="_blank"
                            data-toggle="tooltip" title="Sitio Oficial">
                            <i class="lni lni-world"></i>
                            <span class="nav-link-inner--text d-lg-none">Sitio Web</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="wrapper">
        <div class="hero-cetis">
            <div class="section section-hero section-shaped" style="background: rgba(0, 0, 0, 0.5)">
                <div class="page-header">
                    <div class="container shape-container d-flex align-items-center py-lg">
                        <div class="col px-0">
                            <div class="row align-items-center justify-content-center">
                                <div class="col-lg-6 text-center">
                                    <img src="{{ asset('img/cetis/brand-white.png') }}" style="width: 200px"
                                        class="img-fluid" />
                                    <p class="lead text-white">
                                        Mejora en los procesos de centralización de información
                                        mediante la mordenización de los procesos administrativos
                                        y de gestión con el fin de ofrecer una mejor calidad de
                                        servicios para el Cetis 87.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="separator separator-bottom separator-skew zindex-100">
                    <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
                        xmlns="http://www.w3.org/2000/svg">
                        <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
                    </svg>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="container py-md">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-6 mb-lg-auto">
                        <div class="rounded overflow-hidden transform-perspective-left">
                            <div id="carousel_example" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel_example" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel_example" data-slide-to="1"></li>
                                    <li data-target="#carousel_example" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="img-fluid" src="{{ asset('img/cetis/2.jpg') }}" alt="First slide" />
                                    </div>
                                    <div class="carousel-item">
                                        <img class="img-fluid" src="{{ asset('img/cetis/5.jpg') }}"
                                            alt="Second slide" />
                                    </div>
                                    <div class="carousel-item">
                                        <img class="img-fluid" src="{{ asset('img/cetis/6.jpg') }}" alt="Third slide" />
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carousel_example" role="button"
                                    data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carousel_example" role="button"
                                    data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 mb-5 mb-lg-0">
                        <h1 class="font-weight-light">Nuevos Procesos</h1>
                        <p class="lead mt-4 text-justify">
                            S.I.I-87 Opera en procesos tanto en la administración de los
                            recursos, como en los de la gestión académica. Así mismo, en la
                            generación, mantenimiento y el uso de la información
                            institucional.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <section class="section section-lg section-shaped bg-default py-md">
            <div class="container py-md">
                <div class="row row-grid justify-content-between align-items-center">
                    <div class="col-lg-6">
                        <h3 class="display-3 text-white">
                            Nueva forma<span class="text-white">para conectar al plantel</span>
                        </h3>
                        <p class="lead text-white text-justify">
                            El Sistema Integral de Información 87 busca hacer una red en la
                            que todos los departamentos se encuentren relacionados con el
                            alumando y los docentes para obtener y registrar información.
                        </p>
                        <div class="btn-wrapper">
                            <button type="button" class="btn btn-success" data-toggle="modal"
                                data-target="#modal-student">Alumnos</button>
                            <div class="modal fade" id="modal-student" tabindex="-1" role="dialog"
                                aria-labelledby="modal-default" aria-hidden="true">
                                <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="modal-title-default">Alumnos</h6>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="text-justify">El alumnado del plantel podrá ingresar a esta
                                                plataforma con un correo
                                                electrónico personal esto para poder recibir notificaciones personales.
                                                El alumnado podrá consultar sus calificaciones y sus estados financieros
                                                con un solo click.
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-link  ml-auto"
                                                data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-white" data-toggle="modal"
                                data-target="#modal-teacher">Docentes</button>
                            <div class="modal fade" id="modal-teacher" tabindex="-1" role="dialog"
                                aria-labelledby="modal-default" aria-hidden="true">
                                <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="modal-title-default">Docentes</h6>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="text-justify">Los docentes del plantel podrán ingresar sus .
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-link  ml-auto"
                                                data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 mb-lg-auto">
                        <div class="transform-perspective-right">
                            <div class="card bg-secondary shadow border-0">
                                <div class="card-body">
                                    <img src="{{ asset('img/cetis/10.jpg') }}" class="img-fluid w-100 h-100" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- SVG separator -->
            <div class="separator separator-bottom separator-skew">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
                    xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </section>

        <footer class="footer has-cards">
            {{-- <div class="container container-lg">
                <div class="row">
                    <div class="col-md-6 mb-5 mb-md-0">
                        <div class="card card-lift--hover shadow border-0">
                            <a href="./examples/landing.html" title="Landing Page">
                                <img src="./assets/img/theme/landing.jpg" class="card-img" />
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 mb-5 mb-lg-0">
                        <div class="card card-lift--hover shadow border-0">
                            <a href="./examples/profile.html" title="Profile Page">
                                <img src="./assets/img/theme/profile.jpg" class="card-img" />
                            </a>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="container">
                <hr />
                <div class="row align-items-center justify-content-md-between">
                    <div class="col-md-6">
                        <div class="copyright">
                            &copy; {{ date('Y') }} Centro De Estudios Tecnológicos Industrial y de
                            Servicios No. 87.
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="copyright">
                            Carretera Delicias-Rosetilla Km.4.5 &nbsp; Tel. (639) 474-56-89
                            &nbsp; Delicias, Chih.
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!--   Core JS Files   -->
    <script src="{{ asset('template/argon/js/core/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('template/argon/js/core/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('template/argon/js/core/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('template/argon/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <!--  Plugin for Switches -->
    <script src="{{ asset('template/argon/js/plugins/bootstrap-switch.js') }}"></script>
    <!--  Plugin for the Sliders -->
    <script src="{{ asset('template/argon/js/plugins/nouislider.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('template/argon/js/plugins/moment.min.js') }}"></script>
    <script src="{{ asset('template/argon/js/plugins/datetimepicker.js') }}" type="text/javascript"></script>
    <script src="{{ asset('template/argon/js/plugins/bootstrap-datepicker.min.js') }}"></script>
    <!-- Control Center for Argon UI Kit: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('template/argon/js/argon-design-system.min.js?v=1.2.2') }}" type="text/javascript"></script>
    <script>
        function scrollToDownload() {
        if ($(".section-download").length != 0) {
          $("html, body").animate(
            {
              scrollTop: $(".section-download").offset().top,
            },
            1000
          );
        }
      }
    </script>
    <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
    <script>
        window.TrackJS &&
        TrackJS.install({
          token: "ee6fab19c5a04ac1a32a645abde4613a",
          application: "argon-design-system-pro",
        });
    </script>
</body>

</html>