<div>
    <x-slot name="title">
        Catálogo Indicentes
    </x-slot>

    <x-slot name="header">
        Administrar Catálogo de Indicentes
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="d-flex justify-content-end">
                <button type="button" class="btn bg-gradient-success mb-4" wire:click="launchModal">
                    Agregar nuevo incidente
                </button>
            </div>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <livewire:tables.admin.incident.incident-catalogue-table />
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
                                @endif Indicente</h5>
                            <button type="button" class="close" wire:click="launchModal">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="title">Título del Incidente</label>
                                <input wire:model.defer="state.title" type="text"
                                    class="form-control @error('title') is-invalid @enderror" id="title"
                                    placeholder="Título del Incidente">
                                @error('title')
                                <div class="text-danger">
                                    El título del incidente es requerido
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">Descripción del Incidente</label>
                                <textarea wire:model.defer="state.description" type="text"
                                    class="form-control @error('description') is-invalid @enderror" id="description"
                                    placeholder="Descripción del Incidente"></textarea>
                                @error('description')
                                <div class="text-danger">
                                    La descripción del incidente es requerida
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="type">Tipo de Incidente</label>
                                <div class="controls">
                                    <select id="type" wire:model.defer="state.type"
                                        class="form-control @error('type') is-invalid @enderror"
                                        title="Mencione el tipo">
                                        <option value='' selected disabled>Selecciona una opción</option>
                                        <option value="Falta">Falta</option>
                                        <option value="Apoyo">Apoyo</option>
                                    </select>
                                    @error('type')
                                    <div class="text-danger">
                                        El tipo da Incidente es requerido
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="incident_level">Nivel de Incidente</label>
                                <div class="controls">
                                    <select id="incident_level" wire:model.defer="state.incident_level"
                                        class="form-control @error('incident_level') is-invalid @enderror"
                                        title="Mencione el nivel">
                                        <option value='' selected disabled>Selecciona una opción</option>
                                        <option value="Leve">Leve</option>
                                        <option value="Regular">Regular</option>
                                        <option value="Muy grave">Muy grave</option>
                                    </select>
                                    @error('incident_level')
                                    <div class="text-danger">
                                        El nivel de incidente es requerido
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="penalty">Castigo/Recomendación</label>
                                <textarea wire:model.defer="state.penalty" type="text"
                                    class="form-control @error('penalty') is-invalid @enderror" id="penalty"
                                    placeholder="Descripción de la recomendación o castigo"></textarea>
                                @error('title')
                                <div class="text-danger">
                                    El castigo/recomendación es requerido
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