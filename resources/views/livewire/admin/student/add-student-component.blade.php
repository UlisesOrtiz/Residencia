<div>
    <x-slot name="title">
        Alumnos
    </x-slot>

    <x-slot name="header">
        Administrar Alumnos
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="d-flex justify-content-end">
                <button type="button" class="btn bg-gradient-success mb-4" wire:click="launchModal">
                    Agregar nuevo alumno
                </button>
            </div>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <livewire:tables.admin.student.student-table />
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade @if($modal)show @endif" id="exampleModalLong" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLongTitle" aria-hidden="true"
        style="@if($modal)display: block; padding-right: 16px; overflow-y:scroll; @else display: none; @endif">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">@if (isset($state['id']))
                        Editar @else Agregar
                        @endif Alumno</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name">Nombre del alumno</label>
                                <input wire:model.defer="state.name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" id="name"
                                    placeholder="Nombre del alumno">
                                @error('name')
                                <div class="text-danger">
                                    El nombre es requerido
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="name">Especialidad</label>
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
                                    La especialidad es requerida
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="name">Grupo</label>
                                <select id="section_id" wire:model.defer="state.section_id"
                                    class="form-control @error('section_id') is-invalid @enderror"
                                    title="Mencione el grupo">
                                    <option value='' selected disabled>Selecciona una opción</option>
                                    @foreach ($sections as $section)
                                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                                    @endforeach
                                </select>
                                @error('section_id')
                                <div class="text-danger">
                                    El grupo es requerido
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="control_number">Número de Control</label>
                                <input wire:model.defer="state.control_number" type="text" required
                                    class="form-control @error('control_number') is-invalid @enderror"
                                    id="control_number" placeholder="Número de Control" maxlength="10">
                                @error('control_number')
                                <div class="text-danger">
                                    El número de control ya ha sido registrado
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="period">Período</label>
                                <select id="period" wire:model.defer="state.period"
                                    class="form-control @error('period') is-invalid @enderror"
                                    title="Mencione el período">
                                    <option value='' selected disabled>Selecciona una opción</option>
                                    @foreach ($periods as $period)
                                    <option value="{{ $period }}">{{ $period }}</option>
                                    @endforeach
                                </select>
                                @error('period')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="email">Correo Electrónico</label>
                                <input wire:model.defer="state.email" type="text"
                                    class="form-control @error('email') is-invalid @enderror" id="email"
                                    placeholder="Correo Electrónico">
                                @error('email')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input wire:model.defer="state.password" type="text"
                                    class="form-control @error('password') is-invalid @enderror" id="password"
                                    placeholder="Contraseña">
                                @error('password')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="phone">Teléfono Celular</label>
                                <input wire:model.defer="state.phone" type="text"
                                    class="form-control @error('phone') is-invalid @enderror" id="phone"
                                    placeholder="Celular" maxlength="10">
                                @error('phone')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="telephone">Teléfono</label>
                                <input wire:model.defer="state.telephone" type="text"
                                    class="form-control @error('telephone') is-invalid @enderror" id="telephone"
                                    placeholder="Teléfono base" maxlength="10">
                                @error('telephone')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="birthday">Fecha de nacimiento</label>
                                <input wire:model.defer="state.birthday" type="date"
                                    class="form-control @error('birthday') is-invalid @enderror" id="birthday"
                                    placeholder="Fecha de nacimiento">
                                @error('birthday')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="gender">Género</label>
                                <select name="gender" id="gender" wire:model.defer="state.gender" required
                                    class="form-control" title="Por favor selecciona el género">
                                    <option value="" selected="" disabled="">
                                        Selecciona un género
                                    </option>
                                    @foreach ($genders as $gender)
                                    <option value="{{ $gender }}">
                                        {{ $gender }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('birthday')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="address">Dirección</label>
                                <input wire:model.defer="state.address" type="text"
                                    class="form-control @error('address') is-invalid @enderror" id="address"
                                    placeholder="Dirección">
                                @error('address')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="blood_group">Tipo de sangre</label>
                                <select id="blood_group" wire:model.defer="state.blood_group"
                                    class="form-control @error('blood_group') is-invalid @enderror"
                                    title="Tipo de sangre">
                                    <option value='' selected disabled>Selecciona una opción</option>
                                    @foreach ($bloodType as $blood)
                                    <option value="{{ $blood }}">{{ $blood }}</option>
                                    @endforeach
                                </select>
                                @error('blood_group')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="health_issues">Enfermedades</label>
                                <input wire:model.defer="state.health_issues" type="text"
                                    class="form-control @error('health_issues') is-invalid @enderror" id="health_issues"
                                    placeholder="Mencionar si tiene alguna enfermedad (Opcional)">
                                @error('health_issues')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-primary" wire:click="save">
                        @if(isset($state['id']))
                        Editar @else Guardar
                        @endif</button>
                    <button type="button" class="btn bg-gradient-danger" wire:click="closeModal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</div>