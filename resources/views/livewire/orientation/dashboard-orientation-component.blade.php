<div>
    <x-slot name="title">
        Orientación/Prefectura
    </x-slot>

    <x-slot name="header">
        Tablero de Orientación/Prefectura
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
                            <p>Este es el tablero para usuarios de tipo Orientación/Prefectura, a continuación se
                                describe las
                                funcionalidades:</p>
                            <p>Para comenzar, primero será necesario crear un incidente, para eso se tendrá que realizar
                                mediante la opción catálogo: <a
                                    href="{{ route('orientation.support.catalogue') }}">Catálogo</a>. Aquí se dará de
                                alta el tipo de incidente, puede ser de tipo falta o apoyo, faltas para reportes que
                                ameriten castigo y apoyo para incidentes que requieran apoyo de ejemplo psicológico.
                            </p>
                            <p>Una vez que se haya dado de alta un incidente, ahora será necesario generar el reporte
                                del acontecimiento:
                                <a href="{{ route('orientation.support.creation') }}">Por Estudiante</a>. Cuando
                                se genera el reporte del incidente, el alumno ya tendrá el registro y siempre se
                                mostrará hasta que el alumno cumpla con el castigo o la recomendación.
                            </p>
                            <p>Generado el reporte, para administrar esos incidentes se puede realizar en la siguiente
                                opción: <a href="{{ route('orientation.support.management') }}">Administrar Incidentes</a>.
                                Aquí se podrán dar por cumplidos los incidentes, si el alumno cumplió con su castigo o su recomendación.</p>
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