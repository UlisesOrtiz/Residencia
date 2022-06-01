<div>
    <x-slot name="title">
        Promover alumnos
    </x-slot>

    <x-slot name="header">
        Promover alumnos a otro grupo
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
                                    title="Mencione el grupo" wire:change="getSectionPromotion">
                                    <option value='' selected disabled>Selecciona una opción</option>
                                    @foreach ($sections as $section)
                                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group ml-2">
                                <label for="sectionPromotionId">Grupo a promover</label>
                                <select id="sectionPromotionId" wire:model.defer="sectionPromotionId"
                                    class="form-control" title="Mencione el grupo">
                                    <option value='' selected disabled>Selecciona una opción</option>
                                    @foreach ($sectionPromotion as $section)
                                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group d-flex flex-column ml-2">
                                <button class="btn btn-block btn-success" wire:click="getData">Promover</button>
                            </div>
                        </div>
                    </div>


                    @if ($sectionIdFilter)
                    <table class="table table-bordered table-striped w-100">
                        <thead>
                            <tr
                                class="border-gray-200 bg-gray-800 text-xs leading-4 font-medium text-white align-middle text-center">
                                <th class="text-left">NÚMERO DE CONTROL</th>
                                <th class="text-left">ALUMNO</th>
                                <th>GRADO</th>
                                <th>GRUPO</th>
                                <th>GÉNERO</th>
                                <th>PROMEDIO GENERAL</th>
                                <th>PROMOVER</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($students as $key =>$student)
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
                                <td class="{!! $student['avg'] < 6 ? " bg-danger" : "bg-success" !!}">
                                    {{ $student['avg'] }}
                                </td>
                                <td>
                                    <input class="form-checkbox m-auto" type="checkbox"
                                        wire:model.defer="promotionState.{!! $student['stu']->user->id !!}">
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if (count($students)>0)
                    <div class="row d-flex justify-content-center">
                        <button class="btn btn-success btn-lg p-2 mb-2" wire:click="promotion">
                            Promover alumno(s)
                        </button>
                    </div>
                    @endif

                    @endif
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</div>