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


                    <!-- /.card-header -->
                    @if ($marks && $state['userId'])
                    <div class="flex justify-content-center">
                        <a class="btn btn-success" target="_blank" href="{{ route('report.historic', 
                            ['userId' => $state['userId'] 
                                ? $state['userId'] 
                                : 0 ]) }}">
                            Imprimir reporte
                        </a>
                    </div>

                    <div class="flex justify-center mt-2">
                        <div><b>Estudiante: </b>{{ $studentSelected->user->name }}</div>
                        <div class="mx-2"><b>Número de Control: </b> {{ $studentSelected->user->control_number }}</div>
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
                    @endif
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

        </div>
    </div>
</div>