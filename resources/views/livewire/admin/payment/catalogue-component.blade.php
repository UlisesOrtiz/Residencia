<div>
    <x-slot name="title">
        Catálogo Pagos
    </x-slot>

    <x-slot name="header">
        Administrar Catálogo de Pagos
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="d-flex justify-content-end">
                <button type="button" class="btn bg-gradient-success mb-4" wire:click="launchModal">
                    Agregar nuevo pago
                </button>
            </div>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <livewire:tables.admin.payment.catalogue-table />
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
                                @endif Pago</h5>
                            <button type="button" class="close" wire:click="launchModal">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="title">Título del pago</label>
                                <input wire:model.defer="state.title" type="text"
                                    class="form-control @error('title') is-invalid @enderror" id="title"
                                    placeholder="Título del pago">
                                @error('title')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="amount">Total del pago</label>
                                <input wire:model.defer="state.amount" type="number" step="1"
                                    class="form-control @error('title') is-invalid @enderror" id="amount"
                                    placeholder="Precio del pago">
                                @error('amount')
                                <div class="text-danger">
                                    {{ $message }}
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