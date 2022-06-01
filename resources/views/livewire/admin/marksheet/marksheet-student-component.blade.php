<div>
    <x-slot name="title">
        Boleta de Alumnos
    </x-slot>

    <x-slot name="header">
        Ver Boleta por alumno
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg">
                <div class="card">
                    <div class="row mx-2 my-2 d-flex justify-content-center">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="myClassId">Especialidad</label>
                                <select id="myClassId" wire:model.defer="state.myClassId" class="form-control"
                                    title="Mencione la especialidad" wire:change="changeClass">
                                    <option value='' selected disabled>Selecciona una opción</option>
                                    @foreach ($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group ml-2">
                                <label for="sectionId">Grupo</label>
                                <select id="sectionId" wire:model.defer="state.sectionId" class="form-control"
                                    title="Mencione el grupo" wire:change="getStudents">
                                    <option value='' selected disabled>Selecciona una opción</option>
                                    @foreach ($sections as $section)
                                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group ml-2">
                                <label for="userId">Estudiante</label>
                                <select id="userId" wire:model.defer="state.userId" class="form-control"
                                    title="Mencione el grupo">
                                    <option value='' selected disabled>Selecciona una opción</option>
                                    @foreach ($students as $student)
                                    <option value="{{ $student->user->id }}">{{ $student->user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group d-flex flex-column ml-2">
                                <button class="btn btn-block btn-primary" wire:click="getReport">Buscar</button>
                            </div>
                        </div>

                    </div>

                    @if ($marks && $state['userId'])
                    <div class="flex justify-content-center">
                        <a class="btn btn-success" target="_blank" href="{{ route('marksheet.student.print', 
                            ['userId' => $state['userId'] 
                                ? $state['userId'] 
                                : 0 ]) }}">
                            Imprimir boleta
                        </a>
                    </div>
                    <div class="flex justify-center mt-2">
                        <div><b>Estudiante: </b>{{ $studentSelected->user->name }}</div>
                        <div class="mx-2"><b>Número de Control: </b> {{ $studentSelected->user->control_number }}</div>
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
                    @endif
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

        </div>
    </div>
</div>