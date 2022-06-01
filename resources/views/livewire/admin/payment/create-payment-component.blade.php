<div>
    <x-slot name="title">
        Creación pago
    </x-slot>

    <x-slot name="header">
        Asignar pago a un alumno o grupos
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg">
                <div class="card">
                    <div class="row mx-2 my-2">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="paymentId">Pago</label>
                                <select id="paymentId" wire:model.defer="paymentId" class="form-control"
                                    title="Mencione el pago">
                                    <option value='' selected disabled>Selecciona una opción</option>
                                    @foreach ($payments as $payment)
                                    <option value="{{ $payment->id }}">{{ $payment->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-6" wire:ignore>
                            <div class="form-group">
                                <label for="sectionsSelected">Grupo</label>
                                <select id="sectionsSelected" class="select2-class form-control"
                                    title="Mencione el grupo" multiple>
                                    @foreach ($sections as $section)
                                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group d-flex flex-column ml-2">
                                <label>Generar Pago</label>
                                <button class="btn btn-block btn-primary" wire:click="payment">Generar</button>
                            </div>
                        </div>
                    </div>

                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

        </div>
    </div>

    @section('scripts')
    <script type="text/javascript">
        $(document.body).on("select2:selecting", "#sectionsSelected", (e) => {
            const sectionId = e.params.args.data.id;
            Livewire.emit('addSection', sectionId)
        });

        $(document.body).on("select2:unselecting", "#sectionsSelected", (e) => {
            const sectionId = e.params.args.data.id;
            Livewire.emit('removeSection', sectionId)
        });
    </script>

    @endsection

</div>