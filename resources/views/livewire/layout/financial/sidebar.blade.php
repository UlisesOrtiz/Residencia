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
                <a href="{{ route('financial.profile') }}" class="d-block">
                    {{ explode(" ", Auth::user()->name)[0] }}
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('financial.dashboard') }}"
                        class="nav-link {{ $routeName == 'financial.dashboard' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th-large"></i>
                        <p>Tablero</p>
                    </a>
                </li>

                <li class="nav-item {!! $this->openMenu('financieros/pagos') !!}">
                    <a href="#" class="nav-link {!! $segments[1] == 'pagos' ? 'active' : '' !!}">
                        <i class="nav-icon fas fa-money-bill-alt"></i>
                        <p>
                            Pagos
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('financial.payment.catalogue') }}"
                                class="nav-link {!! $routeName == 'financial.payment.catalogue' ? 'active' : '' !!}">
                                <i class="far {!! $routeName == 'financial.payment.catalogue' ? 'fa-dot-circle' 
                                    : 'fa-circle' !!} nav-icon"></i>
                                <p>Catálogo</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('financial.payment.creation') }}"
                                class="nav-link {!! $routeName == 'financial.payment.creation' ? 'active' : '' !!}">
                                <i class="far {!! $routeName == 'financial.payment.creation' 
                                    ? 'fa-dot-circle': 'fa-circle' !!} nav-icon"></i>
                                <p>Crear Pago Grupal</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('financial.payment.creation.student') }}"
                                class="nav-link {!! $routeName == 'financial.payment.creation.student' ? 'active' : '' !!}">
                                <i class="far {!! $routeName == 'financial.payment.creation.student' 
                                    ? 'fa-dot-circle' : 'fa-circle' !!} nav-icon"></i>
                                <p>Crear Pago Individual</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('financial.payment.management') }}"
                                class="nav-link {!! $routeName == 'financial.payment.management' ? 'active' : '' !!}">
                                <i class="far {!! $routeName == 'financial.payment.management' 
                                                            ? 'fa-dot-circle' : 'fa-circle' !!} nav-icon"></i>
                                <p>Administración pagos</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('financial.profile') }}"
                        class="nav-link {{ $routeName == 'financial.profile' ? 'active' : '' }}">
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