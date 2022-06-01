<div>
    <x-slot name="title">
        Especialidades
    </x-slot>

    <x-slot name="header">
        Administrar Especialidades
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="d-flex justify-content-end">
                <button type="button" class="btn bg-gradient-success mb-4" wire:click="launchModal">
                    Agregar nueva especialidad
                </button>
            </div>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <livewire:tables.admin.academic.my-class-table />
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
                                @endif Especialidad</h5>
                            <button type="button" class="close" wire:click="launchModal">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Nombre de la Especialidad</label>
                                <input wire:model.defer="state.name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" id="name"
                                    placeholder="Especialidad">
                                @error('name')
                                <div class="text-danger">
                                    {{str_contains($message, 'obligatorio')
                                    ? 'El nombre es obligatorio'
                                    : 'La especialidad ya se encuentra registrada, intenta con un nombre diferente' }}
                                </div>
                                @enderror
                            </div>
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