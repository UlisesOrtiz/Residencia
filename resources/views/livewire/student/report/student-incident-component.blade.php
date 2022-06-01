<div>
    <x-slot name="title">
        Historial Incidentes
    </x-slot>

    <x-slot name="header">
        Ver Historial Incidentes por alumno
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
                                <th class="align-middle">TÍTULO DE INCIDENTE</th>
                                <th class="align-middle">DESCRIPCIÓN</th>
                                <th class="align-middle">TIPO DE FALTA</th>
                                <th class="align-middle">NIVEL DE GRAVEDAD</th>
                                <th class="align-middle">CASTIGO/RECOMENDACIÓN</th>
                                <th class="align-middle">CUMPLISTE CON EL CASTIGO/RECOMENDACIÓN</th>
                                <th class="align-middle">AÑO DE INCIDENTE</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($incidents as $incident)
                            <tr class="text-xs font-medium text-center">
                                <td>{{ $incident['incident']['title'] }}</td>
                                <td>{{ $incident['incident']['description'] }}</td>
                                <td>{{ $incident['incident']['type'] }}</td>
                                <td>{{ $incident['incident']['incident_level'] }}</td>
                                <td>{{ $incident['incident']['penalty'] }}</td>
                                <td>{{ $incident->penalty_done ? 'CUMPLIDO' : 'FALTA POR CUMPLIR' }}</td>
                                <td>{{ $incident->year }}</td>
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