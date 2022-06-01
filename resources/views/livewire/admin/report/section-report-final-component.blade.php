<div>
    <x-slot name="title">
        Calificaciones finales
    </x-slot>

    <x-slot name="header">
        Ver calificaciones finales grupos
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg">
                <div class="card">
                    <div class="row mx-2 my-2">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="myClassId">Especialidad</label>
                                <select id="myClassId" wire:model.defer="myClassId" class="form-control"
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
                                <select id="sectionId" wire:model.defer="sectionId" class="form-control"
                                    title="Mencione el grupo" wire:change="getSubjects">
                                    <option value='' selected disabled>Selecciona una opción</option>
                                    @foreach ($sections as $section)
                                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="col-4">
                            <div class="form-group d-flex flex-column ml-2">
                                <label>Aplicar filtro</label>
                                <button class="btn btn-block btn-primary" wire:click="getData">Buscar</button>
                            </div>
                        </div>
                    </div>

                    @if ($sectionIdFilter)
                    <div class="flex justify-content-center">
                        <a class="btn btn-success" target="_blank" href="{{ route('report.historic.section.final', 
                                                                    ['sectionId' => $sectionId 
                                                                        ? $sectionId 
                                                                        : 0,
                                                                    'phaseId' => 1]) }}">
                            Imprimir reporte
                        </a>
                    </div>
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white sm:rounded-lg">
                            <table class="table table-responsive table-bordered table-striped w-100">
                                <thead>
                                    <tr
                                        class="border-gray-200 bg-gray-800 text-xs leading-4 font-medium text-white align-middle">
                                        <th>NÚMERO DE CONTROL</th>
                                        <th>ALUMNO</th>
                                        <th>GRADO</th>
                                        <th>GRUPO</th>
                                        <th>GÉNERO</th>

                                        @foreach ($subjects as $subject)
                                        <th>
                                            {{ $subject->name . ' FINAL' }}
                                        </th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($students as $student)
                                    <tr class="text-xs font-medium text-center">
                                        <td class="text-left">
                                            {{ $student['stu']->user->control_number }}
                                        </td>
                                        <td class="text-left">
                                            {{ $student['stu']->user->name }}
                                        </td>
                                        <td>
                                            {{ $student['stu']->section->semester }}
                                        </td>
                                        <td>
                                            {{ $student['stu']->section->name }}
                                        </td>
                                        <td>
                                            {{ $student['stu']->user->gender }}
                                        </td>
                                        @foreach ($student['marks'] as $mark)
                                        <td>
                                            {{ $mark->final_mark }}
                                        </td>
                                        @endforeach
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endif
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

        </div>
    </div>
</div>