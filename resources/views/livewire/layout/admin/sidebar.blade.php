<aside class="main-sidebar main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" title="SII" class="brand-link">
        <img src="{{asset('img/cetis/white.png')}}" alt="Logo" class="brand-image img-circle" style="opacity: .8">
        <span class="brand-text font-weight-light">Cetis 87</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ empty(Auth::user()->profile_photo_path) 
                    ? Auth::user()->profile_photo_url
                    : url("storage/".Auth::user()->profile_photo_path) }}"
                class="img-circle" alt="User Image">
            </div>

            <div class="info">
                <a href="{{ route('admin.profile') }}" class="d-block">
                    {{ explode(" ", Auth::user()->name)[0] }}
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ $routeName == 'admin.dashboard' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th-large"></i>
                        <p>Tablero</p>
                    </a>
                </li>


                <li class="nav-item {!! $this->openMenu('administrador/administrativo') !!}">
                    <a href="#" class="nav-link {!! $segments[1] == 'administrativo' ? 'active' : '' !!}">
                        <i class="nav-icon fas fa-building"></i>
                        <p>
                            Administrativo
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('administrative.administrative') }}"
                                class="nav-link {!! $routeName == 'administrative.administrative' ? 'active' : '' !!}">
                                <i class="far {!! $routeName == 'administrative.administrative' ? 'fa-dot-circle'
                                                    : 'fa-circle' !!} nav-icon"></i>
                                <p>Personal</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {!! $this->openMenu('administrador/pagos') !!}">
                    <a href="#" class="nav-link {!! $segments[1] == 'pagos' ? 'active' : '' !!}">
                        <i class="nav-icon fas fa-money-bill-alt"></i>
                        <p>
                            Pagos
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('payment.catalogue') }}"
                                class="nav-link {!! $routeName == 'payment.catalogue' ? 'active' : '' !!}">
                                <i class="far {!! $routeName == 'payment.catalogue' ? 'fa-dot-circle' 
                                    : 'fa-circle' !!} nav-icon"></i>
                                <p>Catálogo</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('payment.creation') }}"
                                class="nav-link {!! $routeName == 'payment.creation' ? 'active' : '' !!}">
                                <i class="far {!! $routeName == 'payment.creation' 
                                    ? 'fa-dot-circle': 'fa-circle' !!} nav-icon"></i>
                                <p>Crear Pago Grupal</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('payment.creation.student') }}"
                                class="nav-link {!! $routeName == 'payment.creation.student' ? 'active' : '' !!}">
                                <i class="far {!! $routeName == 'payment.creation.student' 
                                    ? 'fa-dot-circle' : 'fa-circle' !!} nav-icon"></i>
                                <p>Crear Pago Individual</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('payment.management') }}"
                                class="nav-link {!! $routeName == 'payment.management' ? 'active' : '' !!}">
                                <i class="far {!! $routeName == 'payment.management' 
                                                            ? 'fa-dot-circle' : 'fa-circle' !!} nav-icon"></i>
                                <p>Administración pagos</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {!! $this->openMenu('administrador/orientacion/prefectura') !!}">
                    <a href="#" class="nav-link {!! $segments[1] == 'orientacion' ? 'active' : '' !!}">
                        <i class="nav-icon fas fa-hands-helping"></i>
                        <p>
                            Orientación/Prefectura
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('support.catalogue') }}"
                                class="nav-link {!! $routeName == 'support.catalogue' ? 'active' : '' !!}">
                                <i class="far {!! $routeName == 'support.catalogue' 
                                                        ? 'fa-dot-circle' 
                                                        : 'fa-circle' !!} nav-icon"></i>
                                <p>Catálogo</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('support.creation') }}"
                                class="nav-link {!! $routeName == 'support.creation' ? 'active' : '' !!}">
                                <i class="far {!! $routeName == 'support.creation' 
                                                        ? 'fa-dot-circle' 
                                                        : 'fa-circle' !!} nav-icon"></i>
                                <p>Crear Incidente</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('support.management') }}"
                                class="nav-link {!! $routeName == 'support.management' ? 'active' : '' !!}">
                                <i class="far {!! $routeName == 'support.management' 
                                                        ? 'fa-dot-circle' 
                                                        : 'fa-circle' !!} nav-icon"></i>
                                <p>Administración Incidentes</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {!! $this->openMenu('administrador/academicos') !!}">
                    <a href="#" class="nav-link {!! $segments[1] == 'academicos' ? 'active' : '' !!}">
                        <i class="nav-icon fas fa-graduation-cap"></i>
                        <p>
                            Académicos
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('academics.myclass') }}"
                                class="nav-link {!! $routeName == 'academics.myclass' ? 'active' : '' !!}">
                                <i class="far {!! $routeName == 'academics.myclass' ? 'fa-dot-circle'
                                    : 'fa-circle' !!} nav-icon"></i>
                                <p>Especialidad</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('academics.section') }}"
                                class="nav-link {!! $routeName == 'academics.section' ? 'active' : '' !!}">
                                <i
                                    class="far {!! $routeName == 'academics.section' ? 'fa-dot-circle' : 'fa-circle' !!} nav-icon"></i>
                                <p>Grupo</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('academics.subject') }}"
                                class="nav-link {!! $routeName == 'academics.subject' ? 'active' : '' !!}">
                                <i
                                    class="far {!! $routeName == 'academics.subject' ? 'fa-dot-circle'                                                                        : 'fa-circle' !!} nav-icon"></i>
                                <p>Materia</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {!! $this->openMenu('administrador/estudiantes') !!}">
                    <a href="#" class="nav-link {!! $segments[1] == 'estudiantes' ? 'active' : '' !!}">
                        <i class="nav-icon fas fa-user-graduate"></i>
                        <p>
                            Estudiantes
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('students.admit') }}"
                                class="nav-link {!! $routeName == 'students.admit' ? 'active' : '' !!}">
                                <i
                                    class="far {!! $routeName == 'students.admit' ? 'fa-dot-circle' : 'fa-circle' !!} nav-icon"></i>
                                <p>Administrar Alumno</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('students.sections') }}"
                                class="nav-link {!! $routeName == 'students.sections' ? 'active' : '' !!}">
                                <i
                                    class="far {!! $routeName == 'students.sections' ? 'fa-dot-circle': 'fa-circle' !!} nav-icon"></i>
                                <p>Ver grupos</p>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{ route('students.promotion') }}"
                                class="nav-link {!! $routeName == 'students.promotion' ? 'active' : '' !!}">
                                <i
                                    class="far {!! $routeName == 'students.promotion' ? 'fa-dot-circle': 'fa-circle' !!} nav-icon"></i>
                                <p>Promover Alumnos</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {!! $this->openMenu('administrador/calificacion') !!}">
                    <a href="#" class="nav-link {!! $segments[1] == 'calificacion' ? 'active' : '' !!}">
                        <i class="nav-icon fas fa-check-double"></i>
                        <p>
                            Calificaciones
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.marks') }}"
                                class="nav-link {!! $routeName == 'admin.marks' ? 'active' : '' !!}">
                                <i
                                    class="far {!! $routeName == 'admin.marks' ? 'fa-dot-circle': 'fa-circle' !!} nav-icon"></i>
                                <p>Por materia</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.marks.final') }}"
                                class="nav-link {!! $routeName == 'admin.marks.final' ? 'active' : '' !!}">
                                <i
                                    class="far {!! $routeName == 'admin.marks.final' ? 'fa-dot-circle': 'fa-circle' !!} nav-icon"></i>
                                <p>Finales por materia</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.marks.section') }}"
                                class="nav-link {!! $routeName == 'admin.marks.section' ? 'active' : '' !!}">
                                <i
                                    class="far {!! $routeName == 'admin.marks.section' ? 'fa-dot-circle': 'fa-circle' !!} nav-icon"></i>
                                <p>Por grupo</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.marks.final.section') }}"
                                class="nav-link {!! $routeName == 'admin.marks.final.section' ? 'active' : '' !!}">
                                <i
                                    class="far {!! $routeName == 'admin.marks.final.section' ? 'fa-dot-circle': 'fa-circle' !!} nav-icon"></i>
                                <p>Finales por grupo</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {!! $this->openMenu('administrador/boleta') !!}">
                    <a href="#" class="nav-link {!! $segments[1] == 'boleta' ? 'active' : '' !!}">
                        <i class="nav-icon fas fa-id-card"></i>
                        <p>
                            Boleta
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('marksheet.student') }}"
                                class="nav-link {!! $routeName == 'marksheet.student' ? 'active' : '' !!}">
                                <i class="far {!! $routeName == 'marksheet.student' 
                                    ? 'fa-dot-circle' : 'fa-circle' !!} nav-icon"></i>
                                <p>Boleta Alumno</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('marksheet.section') }}"
                                class="nav-link {!! $routeName == 'marksheet.section' ? 'active' : '' !!}">
                                <i
                                    class="far {!! $routeName == 'marksheet.section' ? 'fa-dot-circle'
                                                                                                                                                    : 'fa-circle' !!} nav-icon"></i>
                                <p>Boleta Grupo</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {!! $this->openMenu('administrador/reporte') !!}">
                    <a href="#" class="nav-link {!! $segments[1] == 'reporte' ? 'active' : '' !!}">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            Reporte
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('report.student') }}"
                                class="nav-link {!! $routeName == 'report.student' ? 'active' : '' !!}">
                                <i class="far {!! $routeName == 'report.student' ? 'fa-dot-circle'
                                                                                    : 'fa-circle' !!} nav-icon"></i>
                                <p>Historial Académico</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('report.section') }}"
                                class="nav-link {!! $routeName == 'report.section' ? 'active' : '' !!}">
                                <i
                                    class="far {!! $routeName == 'report.section' ? 'fa-dot-circle'
                                                                                                                    : 'fa-circle' !!} nav-icon"></i>
                                <p>Calificación Etapa</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('report.section.final') }}"
                                class="nav-link {!! $routeName == 'report.section.final' ? 'active' : '' !!}">
                                <i
                                    class="far {!! $routeName == 'report.section.final' ? 'fa-dot-circle'
                                                                                                                                                                    : 'fa-circle' !!} nav-icon"></i>
                                <p>Calificación Final</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('report.section.attendance') }}"
                                class="nav-link {!! $routeName == 'report.section.attendance' ? 'active' : '' !!}">
                                <i
                                    class="far {!! $routeName == 'report.section.attendance' ? 'fa-dot-circle'
                                                                                                                                                                : 'fa-circle' !!} nav-icon"></i>
                                <p>Asistencias Etapa</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.profile') }}"
                        class="nav-link {{ $routeName == 'admin.profile' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Perfil</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>