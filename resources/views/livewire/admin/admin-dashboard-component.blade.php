<div>
    <x-slot name="title">
        Tablero
    </x-slot>

    <x-slot name="header">
        Tablero de Administrador
    </x-slot>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation" wire:click="$set('testTab', 'pills-home')">
                                <a class="nav-link {!! $testTab == 'pills-home' ? 'active' : '' !!}" id="pills-home-tab"
                                    data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home"
                                    aria-selected="true">Home</a>
                            </li>
                            <li class="nav-item" role="presentation" wire:click="$set('testTab', 'pills-profile')">
                                <a class="nav-link {!! $testTab == 'pills-profile' ? 'active' : '' !!}"
                                    id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                                    aria-controls="pills-profile" aria-selected="false">Profile</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact"
                                    role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
                            </li>
                        </ul>
                    </div>

                    <div class="card-body">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade {!! $testTab == 'pills-home' ? 'show active' : '' !!} "
                                id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">Uno</div>
                            <div class="tab-pane fade {!! $testTab == 'pills-profile' ? 'show active' : '' !!}"
                                id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">Dos</div>
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                aria-labelledby="pills-contact-tab">Tres</div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div> --}}

    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $students }}</h3>
                    <p>Alumnos registrados</p>
                </div>
                <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $teachers }}</h3>
                    <p>Docentes registrados</p>
                </div>
                <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $financials }}</h3>
                    <p>Financieros Registrados</p>
                </div>
                <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $orientation }}</h3>
                    <p>Soporte Registrados</p>
                </div>
                <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->


    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $incidents }}</h3>
                    <p>Incidentes registrados</p>
                </div>
                <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $incidentsDone }}</h3>
                    <p>Incidentes completados</p>
                </div>
                <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $payments }}</h3>
                    <p>Pagos Registrados</p>
                </div>
                <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $paymentsDone }}</h3>
                    <p>Pagos Realizados</p>
                </div>
                <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->


    {{--
    @push('alpine-plugins')
    <script defer src="https://unpkg.com/@alpinejs/persist@3.x.x/dist/cdn.min.js"></script>
    @endpush --}}
</div>