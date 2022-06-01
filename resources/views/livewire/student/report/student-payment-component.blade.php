<div>
    <x-slot name="title">
        Historial de Pagos
    </x-slot>

    <x-slot name="header">
        Ver Historial de Pagos por alumno
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg">
                <div class="card">

                    <div class="flex justify-center mt-2">
                        <div><b>Estudiante: </b>{{ $user->name }}</div>
                        <div class="mx-2"><b>Número de Control: </b> {{ $user->control_number }}</div>
                    </div>

                    <table class="table table-bordered table-striped w-100">
                        <thead>
                            <tr
                                class="border-gray-200 bg-gray-800 text-xs leading-4 font-medium text-white text-center">
                                <th class="align-middle">CONCEPTO PAGO</th>
                                <th class="align-middle">REFERENCIA</th>
                                <th class="align-middle">CANTIDAD PAGADA</th>
                                <th class="align-middle">SALDO</th>
                                <th class="align-middle">PAGADO</th>
                                <th class="align-middle">AÑO DE PAGO</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $payment)
                            <tr class="text-xs font-medium text-center">
                                <td>
                                    {{ $payment['payment']['title'] }}
                                </td>
                                <td>
                                    {{ $payment['ref_no'] }}
                                </td>
                                <td>
                                    {{ $payment['amt_paid'] }}
                                </td>
                                <td>
                                    {{ $payment['balance'] }}
                                </td>
                                <td>
                                    {{ $payment['paid'] ? 'PAGADO' : 'FALTA PAGAR' }}
                                </td>
                                <td>
                                    {{ $payment['year'] }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</div>