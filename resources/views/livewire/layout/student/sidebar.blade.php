<aside class="main-sidebar main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('student.dashboard') }}" title="SII" class="brand-link">
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
                <a href="{{ route('student.profile') }}" class="d-block">
                    {{ explode(" ", Auth::user()->name)[0] }}
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('student.dashboard') }}"
                        class="nav-link {{ $routeName == 'student.dashboard' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th-large"></i>
                        <p>Tablero</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('student.marksheet') }}"
                        class="nav-link {{ $routeName == 'student.marksheet' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-id-card"></i>
                        <p>Boleta de Calificaciones</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('student.historic') }}"
                        class="nav-link {{ $routeName == 'student.historic' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>Historial Académico</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('student.historic.payment') }}"
                        class="nav-link {{ $routeName == 'student.historic.payment' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-money-bill-alt"></i>
                        <p>Historial Pagos</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('student.historic.incident') }}"
                        class="nav-link {{ $routeName == 'student.historic.incident' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-hands-helping"></i>
                        <p>Historial Incidentes</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('student.profile') }}"
                        class="nav-link {{ $routeName == 'student.profile' ? 'active' : '' }}">
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