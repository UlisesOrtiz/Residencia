<div>
    <x-slot name="title">
        Ver Grupos
    </x-slot>

    <x-slot name="header">
        Ver lista de grupos
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
                                    title="Mencione el grupo" wire:change="getSection">
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
                    <livewire:tables.admin.student.sections-table sectionId={{$sectionIdFilter}} />
                    @endif
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

        </div>
    </div>
</div>