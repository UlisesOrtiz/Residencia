<div>
    <x-slot name="title">
        Financieros
    </x-slot>

    <x-slot name="header">
        Tablero de Financieros
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
                            <p>Este es el tablero para usuarios de tipo financieros, a continuación se describe las
                                funcionalidades:</p>
                            <p>Para comenzar, primero será necesario crear un pago, para eso se tendrá que realizar
                                mediante la opción catálogo: <a
                                    href="{{ route('financial.payment.catalogue') }}">Catálogo</a>. En esta
                                opción es importante dar de alta el concepto del pago y el costo.
                            </p>
                            <p>Una vez que se haya dado de alta un pago, ahora será necesario generar un histórico de
                                pago, para generar el histórico se puede realizar de dos maneras: <a
                                    href="{{ route('financial.payment.creation') }}">Por Grupos</a>, <a
                                    href="{{ route('financial.payment.creation.student') }}">Por Estudiante</a>. Cuando
                                se genera por grupo, se hace la inserción del pago por todos los alumnos que se
                                encuentren activos en ese grupo. </p>
                            <p>Generado el histórico, para administrar esos pagos se puede realizar en la siguiente
                                opción: <a href="{{ route('financial.payment.management') }}">Administrar Pagos</a>.
                                Aquí se podrán liquidar los pagos o abonar, teniendo varias opciones disponibles.</p>
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