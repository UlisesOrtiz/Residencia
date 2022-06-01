<div>
    <x-slot name="title">
        Calificaciones por etapa grupo
    </x-slot>

    <x-slot name="header">
        Ver calificaciones por etapa grupos
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg">
                <div class="card">
                    <div class="row mx-2 my-2 d-flex justify-content-center">
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
                            <div class="form-group ml-2">
                                <label for="phaseId">Etapa</label>
                                <select id="phaseId" wire:model.defer="phaseId" class="form-control"
                                    title="Mencione el grupo">
                                    <option value='' selected disabled>Selecciona una opción</option>
                                    @foreach ($phases as $key => $phase)
                                    <option value="{{ $key }}">{{ $phase }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group d-flex flex-column ml-2">
                                <button class="btn btn-block btn-primary" wire:click="getData">Buscar</button>
                            </div>
                        </div>
                    </div>

                    @if ($phaseIdFilter)
                    <div class="flex justify-content-center">
                        <a class="btn btn-success" target="_blank" href="{{ route('report.historic.section', 
                            ['sectionId' => $sectionId 
                                ? $sectionId 
                                : 0,
                            'phaseId' => $phaseIdFilter 
                                ? $phaseIdFilter 
                                : 0]) }}">
                            Imprimir reporte
                        </a>
                    </div>
                    <div class="flex justify-center mt-2">
                        <div><b>Grupo: </b>{{ $students[0]['stu']->section->name }}</div>
                        <div class="mx-2"><b>Semestre: </b> {{ $students[0]['stu']->section->semester }}</div>
                    </div>
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
                                    {{ $subject->name }}
                                </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($students as $student)
                            <tr class="text-xs font-medium text-center">
                                <td class="text-left">
                                    {{$student['stu']->user->control_number }}
                                </td>
                                <td class="text-left">
                                    {{$student['stu']->user->name }}
                                </td>
                                <td>
                                    {{$student['stu']->section->semester }}
                                </td>
                                <td>
                                    {{$student['stu']->section->name }}
                                </td>
                                <td>
                                    {{$student['stu']->user->gender }}
                                </td>
                                @foreach ($student['marks'] as $mark)

                                @php
                                $markSelected = null;
                                switch ($phaseIdFilter) {
                                case 1:
                                $markSelected = $mark->first_mark;
                                break;

                                case 2:
                                $markSelected = $mark->second_mark;
                                break;

                                case 3:
                                $markSelected = $mark->third_mark;
                                break;
                                }
                                @endphp

                                <td>
                                    {{$markSelected}}
                                </td>

                                @php $markSelected = null; @endphp

                                @endforeach
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