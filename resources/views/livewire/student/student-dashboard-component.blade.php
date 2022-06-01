<div>
    <x-slot name="title">
        Alumnos
    </x-slot>

    <x-slot name="header">
        Tablero de Alumnos
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="row d-flex justify-content-center">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header bg-dark text-white">BIENVENID@ {{ Auth::user()->name }}</div>
                        <div class="card-body text-justify">
                            <p>Hola <b>{{ Auth::user()->name }}</b> te damos la bienvenida al Sistema Integral de
                                Información del CETis 87.</p>
                            <p>En este nuevo sistema podrás consultar tus califiaciones, estado de pagos, historial
                                académico.</p>
                            <p>Para comenzar puedes revisar los siguientes enlaces:
                            <ul>
                                <li><a href="{{ route('student.marksheet') }}">&#149; Calificaciones</a></li>
                                <li><a href="{{ route('student.historic.payment') }}">&#149; Pagos</a></li>
                                <li><a href="{{ route('student.historic') }}">&#149; Historial Académico</a>
                                <li><a href="{{ route('student.historic.incident') }}">&#149; Incidentes</a>
                                </li>
                            </ul>
                            </p>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            Mensaje entregado por el departamento administrativo del CETis 87.
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
</div>