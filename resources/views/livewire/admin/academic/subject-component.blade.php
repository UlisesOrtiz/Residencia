<div>
    <x-slot name="title">
        Materias
    </x-slot>

    <x-slot name="header">
        Administrar Materias
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="d-flex justify-content-end">
                <button type="button" class="btn bg-gradient-success mb-4" wire:click="launchModal">
                    Agregar nueva materia
                </button>
            </div>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <livewire:tables.admin.academic.subject-table />
            </div>

            <!-- Modal -->
            <div class="modal fade @if($modal)show @endif" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLongTitle" aria-hidden="true"
                style="@if($modal)display: block; padding-right: 16px; overflow-y:scroll;@else display: none; @endif ">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">@if (isset($state['id']))
                                Editar @else Agregar
                                @endif Materia</h5>
                            <button type="button" class="close" wire:click="launchModal">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="name">Nombre de la materia</label>
                                <input wire:model.defer="state.name" type="text" autocomplete="off"
                                    class="form-control @error('name') is-invalid @enderror" id="name"
                                    placeholder="Materia">
                                @error('name')
                                <div class="text-danger">
                                    El nombre es obligatorio
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="slug">Abreviatura</label>
                                <input wire:model.defer="state.slug" type="text" autocomplete="off"
                                    class="form-control @error('slug') is-invalid @enderror" id="slug"
                                    placeholder="Ejemplo: Esp.">
                                @error('slug')
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
                                        title="Mencione la especialidad" wire:change="changeClass">
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
                                <label for="section_id">Grupo</label>
                                <div class="controls">
                                    <select id="section_id" wire:model.defer="state.section_id"
                                        class="form-control @error('section_id') is-invalid @enderror"
                                        title="Mencione el grupo" wire:change="getTime">
                                        <option value='' selected disabled>Selecciona una opción</option>
                                        @foreach ($sections as $section)
                                        <option value="{{ $section->id }}">{{ $section->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('section_id')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="time">Turno</label>
                                <div class="controls">
                                    <select id="time" wire:model.defer="state.time"
                                        class="form-control @error('time') is-invalid @enderror"
                                        title="Mencione la especialidad">
                                        <option value='' selected disabled="">Selecciona una opción</option>
                                        @foreach ($times as $time)
                                        <option value="{{ $time }}">{{ $time }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('time')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="teacher_id">Docente</label>
                                <div class="controls">
                                    <select id="teacher_id" wire:model.defer="state.teacher_id"
                                        class="form-control @error('teacher_id') is-invalid @enderror"
                                        title="Mencione el docente">
                                        <option value='' selected disabled>Selecciona una opción</option>
                                        @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('teacher_id')
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
                                        @for ($i = 1; $i < 7; $i++) <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                    </select>
                                </div>
                                @error('semester')
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