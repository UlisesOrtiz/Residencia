<?php

namespace App\Http\Livewire\Admin\Incident;

use Livewire\Component;
use App\Models\Incident;
use App\Helpers\ModelHelper;
use Illuminate\Support\Facades\Validator;

class IncidentCatalogueComponent extends Component
{
    protected $listeners = ['editIncident', 'deleteIncident', 'callConfirmationIncident'];
    public $modal = false;
    public $state = ['incident_level' => '', 'type' => ''];

    public function render()
    {
        return view('livewire.admin.incident.incident-catalogue-component');
    }
    public function save()
    {
        $idValidator = array_key_exists('id', $this->state) ? $this->state['id'] : '';

        $validateData = Validator::make($this->state, $this->rules())->validate();

        $validateData['title'] = mb_strtoupper($validateData['title'], 'UTF-8');
        Incident::updateOrCreate(['id' => $idValidator], $validateData);

        $this->launchModal();
        $this->sendMessage($idValidator ? 'actualizado' : 'creado');
    }

    public function editIncident(int $id)
    {
        $this->state = ModelHelper::modelToArray(Incident::class, $id);
        $this->launchModal();
    }

    public function callConfirmationIncident($id)
    {
        $incident = ModelHelper::findModel(Incident::class, $id);
        $this->dispatchBrowserEvent('confirmation', [
            'name' => $incident->title,
            'id' => $incident->id,
            'event' => 'deleteIncident',
        ]);
    }

    public function deleteIncident(int $id)
    {
        Incident::find($id)->delete();
        $this->sendMessage('eliminado');
    }

    public function launchModal()
    {
        $this->modal = !$this->modal;
        $this->dispatchBrowserEvent('openModal', ['modal' => $this->modal]);
    }

    public function sendMessage(string $message)
    {
        $this->dispatchBrowserEvent('message', [
            'message' => "Incidente {$message} correctamente",
            'type' => 'success'
        ]);

        $this->emit('refreshLivewireDatatable');
        $this->state = [];
    }

    public function rules(): array
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'type' => 'required',
            'incident_level' => 'required',
            'penalty' => 'required',
        ];
    }
}
