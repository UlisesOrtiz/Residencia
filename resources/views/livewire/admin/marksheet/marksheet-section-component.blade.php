<div>
    <x-slot name="title">
        Boleta grupal
    </x-slot>

    <x-slot name="header">
        Ver Boleta por grupo
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg">
                <div class="card">
                    <div class="row mx-2 my-2">
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
                                    title="Mencione el grupo" wire:change="changeSection">
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
                                <button class="btn btn-block btn-primary" wire:click="getReport">Buscar</button>
                            </div>
                        </div>
                    </div>

                    @if ($students && $state['sectionId'])
                    <div class="flex justify-content-center mb-5">
                        <a class="btn btn-success" target="_blank" href="{{ route('marksheet.section.print', 
                        ['sectionId' => $state['sectionId'] 
                            ? $state['sectionId'] 
                            : 0 ]) }}">
                            Imprimir boletas
                        </a>
                    </div>
                    @endif
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

        </div>
    </div>
</div>