<div>
    <x-slot name="title">
        Grupos
    </x-slot>

    <x-slot name="header">
        Administrar Grupos
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="d-flex justify-content-end">
                <button type="button" class="btn bg-gradient-success mb-4" wire:click="launchModal">
                    Agregar nuevo grupo
                </button>
            </div>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <livewire:tables.admin.academic.section-table />
            </div>

            <!-- Modal -->
            <div class="modal fade @if($modal)show @endif" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLongTitle" aria-hidden="true"
                style="@if($modal)display: block; padding-right: 16px; overflow-y:scroll; @else display: none; @endif ">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">@if (isset($state['id']))
                                Editar @else Agregar
                                @endif Grupo</h5>
                            <button type="button" class="close" wire:click="launchModal">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Nombre del grupo</label>
                                <input wire:model.defer="state.name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" id="name"
                                    placeholder="Grupo">
                                @error('name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="my_class_id">Especialidad</label>
                                <div class="controls">
                                    <select id="my_class_id" wire:model.defer="state.my_class_id"
                                        class="form-control @error('my_class_id') is-invalid @enderror"
                                        title="Mencione la especialidad">
                                        <option value='' selected disabled>Selecciona una opción</option>
                                        @foreach ($classes as $class)
                                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('my_class_id')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="semester">Semestre</label>
                                <div class="controls">
                                    <select id="semester" wire:model.defer="state.semester"
                                        class="form-control @error('semester') is-invalid @enderror"
                                        title="Mencione la especialidad">
                                        <option value='' selected disabled="">Selecciona una opción</option>
                                        @for ($i = 1; $i < 10; $i++) <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                    </select>
                                </div>
                                @error('semester')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="time">Turno</label>
                                <div class="controls">
                                    <select id="time" wire:model.defer="state.time"
                                        class="form-control @error('time') is-invalid @enderror"
                                        title="Mencione la especialidad">
                                        <option value='' selected disabled="">Selecciona una opción</option>
                                        <option value='MATUTINO'>MATUTINO</option>
                                        <option value='VESPERTINO'>VESPERTINO</option>
                                    </select>
                                </div>
                                @error('time')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn bg-gradient-primary" wire:click="save">
                                    @if(isset($state['id']))
                                    Editar @else Guardar
                                    @endif</button>
                                <button type="button" class="btn bg-gradient-danger"
                                    wire:click="launchModal">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>