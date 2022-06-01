<div>
    <x-slot name="title">
        Administración de incidentes
    </x-slot>

    <x-slot name="header">
        Administrar los incidentes por grupos
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
                    <div class="w-100">
                        <div class="bg-white sm:rounded-lg">
                            <div class="card">
                                <div class="card-header">
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link {!! $tab == 'pills-home' ? 'active' : '' !!}"
                                                id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                                                aria-controls="pills-home" aria-selected="true">GRUPO</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link {!! $tab == 'pills-profile' ? 'active' : '' !!}"
                                                id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                                                role="tab" aria-controls="pills-profile" aria-selected="false">INCIDENTES</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade {!! $tab == 'pills-home' ? 'show active' : '' !!} "
                                            id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                            <table class="table table-bordered table-striped w-100">
                                                <thead>
                                                    <tr
                                                        class="border-gray-200 bg-gray-800 text-xs leading-4 font-medium text-white align-middle">
                                                        <th>NÚMERO DE CONTROL</th>
                                                        <th>ALUMNO</th>
                                                        <th>GRADO</th>
                                                        <th>GRUPO</th>
                                                        <th>GÉNERO</th>
                                                        <th>ADMINISTRAR</th>
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
                                                        <td>
                                                            <button class="btn btn-info"
                                                                wire:click="setStudent({{ json_encode($student) }})">Ver
                                                                Incidentes</button>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="tab-pane fade {!! $tab == 'pills-profile' ? 'show active' : '' !!}"
                                            id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                            @if ($studentSelected)

                                            <div class="row">
                                                <div class="col-12">
                                                    <h1
                                                        class="border-gray-200 bg-gray-800 text-md text-center font-medium text-white p-3">
                                                        ALUMNO: {{ $studentSelected['stu']['user']['name'] }}</h1>
                                                </div>


                                                <div class="col-12 p-3">
                                                    <table class="table table-bordered table-striped w-100">
                                                        <thead>
                                                            <tr
                                                                class="border-gray-200 bg-gray-800 text-xs leading-4 font-medium text-white align-middle text-center">
                                                                <th>INCIDENTE</th>
                                                                <th>DESCRIPCIÓN</th>
                                                                <th>TIPO DE INCIDENTE</th>
                                                                <th>GRAVEDAD DE INCIDENTE</th>
                                                                <th>CASTIGO/RECOMENDACIÓN</th>
                                                                <th>AÑO DE ASIGNACIÓN</th>
                                                                <th>CASTIGO/RECOMENDACIÓN CUMPLIDO(A)</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($studentSelected['incidents'] as $incident)
                                                            <tr class="text-xs font-medium text-center">
                                                                <td>
                                                                    {{ $incident['incident']['title'] }}
                                                                </td>
                                                                <td>
                                                                    {{ $incident['incident']['description'] }}
                                                                </td>
                                                                <td>
                                                                    {{ $incident['incident']['type'] }}
                                                                </td>
                                                                <td>
                                                                    {{ $incident['incident']['incident_level'] }}
                                                                </td>
                                                                <td>
                                                                    {{ $incident['incident']['penalty'] }}
                                                                </td>
                                                                <td>
                                                                    {{ $incident['year'] }}
                                                                </td>
                                                                <td>
                                                                    @if ($incident['penalty_done'])
                                                                    <span>CUMPLIDO</span>
                                                                    @else
                                                                    <input class="form-checkbox m-auto" type="checkbox"
                                                                        wire:model.defer="studentState.{!! $incident['id'] !!}.checkbox">
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="row d-flex justify-center mt-2">
                                                <div class="form-group d-flex justify-content-center flex-column ml-2">
                                                    <button class="btn btn-block btn-success"
                                                        wire:click="saveIncidents">Guardar Registros</button>
                                                </div>
                                            </div>

                                            @endif
                                        </div>
                                    </div>
                                </div>
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
</div>