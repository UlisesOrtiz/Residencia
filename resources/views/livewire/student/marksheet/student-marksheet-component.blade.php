<div>
    <x-slot name="title">
        Boleta de {{ $user->name }}
    </x-slot>

    <x-slot name="header">
        Ver Boleta de {{ $user->name }}
    </x-slot>

    <div class="py-4">
        <div class="card">
            <div class="flex justify-content-center">
                {{-- <a class="btn btn-success" target="_blank" href="{{ route('marksheet.student.print', 
                            ['userId' => $state['userId'] 
                                ? $state['userId'] 
                                : 0 ]) }}">
                    Imprimir boleta
                </a> --}}
            </div>
            <div class="flex justify-center mt-2">
                <div><b>Estudiante: </b>{{ $user->name }}</div>
                <div class="mx-2"><b>Número de Control: </b> {{ $user->control_number }}</div>
            </div>
            <table class="table table-bordered table-striped w-100">
                <thead>
                    <tr class="border-gray-200 bg-gray-800 text-xs leading-4 font-medium text-white">
                        <th>ASIGNATURA/ MODULO</th>
                        <th>1ER. P.</th>
                        <th>2DO. P.</th>
                        <th>3ER. P.</th>
                        <th>1ER. P. A.</th>
                        <th>2DO. P. A.</th>
                        <th>3ER. P. A.</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($marks as $mark)
                    <tr class="text-center">
                        <td class="text-left">{{ $mark->subject->name }}</td>
                        <td>{{ $mark->first_mark }}</td>
                        <td>{{ $mark->second_mark }}</td>
                        <td>{{ $mark->third_mark }}</td>
                        <td>{{ $mark->first_attendance }}</td>
                        <td>{{ $mark->second_attendance }}</td>
                        <td>{{ $mark->third_attendance }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>