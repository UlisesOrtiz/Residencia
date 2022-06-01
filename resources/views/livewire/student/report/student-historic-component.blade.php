<div>
    <x-slot name="title">
        Historial Académico
    </x-slot>

    <x-slot name="header">
        Ver Historial Académico por alumno
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg">
                <div class="card">
                    {{-- <div class="flex justify-content-center">
                        <a class="btn btn-success" target="_blank" href="{{ route('report.historic', 
                            ['userId' => $state['userId'] 
                                ? $state['userId'] 
                                : 0 ]) }}">
                            Imprimir reporte
                        </a>
                    </div> --}}

                    <div class="flex justify-center mt-2">
                        <div><b>Estudiante: </b>{{ $user->name }}</div>
                        <div class="mx-2"><b>Número de Control: </b> {{ $user->control_number }}</div>
                    </div>

                    <table class="table table-bordered table-striped w-100">
                        <thead>
                            <tr class="border-gray-200 bg-gray-800 text-xs leading-4 font-medium text-white">
                                <th>Semestre</th>
                                <th>Materia</th>
                                <th>Calificación</th>
                                <th>Período Escolar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($marks as $mark)
                            <tr>
                                <td>{{ $mark->semester }}</td>
                                <td>{{ $mark->subject->name }}</td>
                                <td>{{ $mark->first_mark }}</td>
                                <td>{{ $mark->period .' '. $mark->year }}</td>
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