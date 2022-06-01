<div>
    <x-slot name="title">
        Creación incidente alumno
    </x-slot>

    <x-slot name="header">
        Asignar Incidente a un alumno
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg">
                <div class="card">
                    <div class="row mx-2 my-2">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="incidentId">Incidente</label>
                                <select id="incidentId" wire:model.defer="incidentId" class="form-control"
                                    title="Mencione el pago">
                                    <option value='' selected disabled>Selecciona una opción</option>
                                    @foreach ($incidents as $incident)
                                    <option value="{{ $incident->id }}">{{ $incident->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="col-6" wire:ignore>
                            <div class="form-group">
                                <label for="studentsSelected">Alumno(s)</label>
                                <select id="studentsSelected" class="select2-class form-control"
                                    title="Mencione el grupo" multiple>
                                    @foreach ($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="col-4">
                            <div class="form-group d-flex flex-column ml-2">
                                <label>Generar Indicente</label>
                                <button class="btn btn-block btn-primary" wire:click="incident">Generar</button>
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
        $(document.body).on("select2:selecting", "#studentsSelected", (e) => {
            const sectionId = e.params.args.data.id;
            Livewire.emit('addStudent', sectionId)
        });

        $(document.body).on("select2:unselecting", "#studentsSelected", (e) => {
            const sectionId = e.params.args.data.id;
            Livewire.emit('removeStudent', sectionId)
        });
    </script>

    @endsection

</div>