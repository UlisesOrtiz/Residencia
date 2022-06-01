<?php

namespace App\Http\Livewire\Admin\Incident;

use Livewire\Component;
use App\Models\User;
use App\Models\Incident;
use App\Constants\Constants;
use App\Models\IncidentRecord;

class CreateIncidentComponent extends Component
{
    protected $listeners = ['addStudent', 'removeStudent'];
    public $incidentId = '';
    public $students = [], $incidents = [];
    public $studentsSelected = [];

    public function render()
    {
        return view('livewire.admin.incident.create-incident-component');
    }

    public function mount()
    {
        $this->students = User::where('role', Constants::ROLE['ESTUDIANTE'])->get();
        $this->incidents = Incident::all();
    }

    public function incident()
    {
        foreach ($this->studentsSelected as $student) {
            IncidentRecord::create([
                'incident_id' => $this->incidentId,
                'user_id' => $student,
                'year' => date('Y'),
                'penalty_done' => false
            ]);
        }

        $this->dispatchBrowserEvent('message', [
            'message' => "Incidente generado correctamente",
            'type' => 'success'
        ]);

        $this->dispatchBrowserEvent('clearSelect2', [
            'id' => "studentsSelected"
        ]);
        $this->incidentId = '';
        $this->studentsSelected = [];
    }

    public function addStudent($value)
    {
        $idValidator = array_key_exists($value, $this->studentsSelected);
        if (!$idValidator) $this->studentsSelected[$value] = $value;
    }

    public function removeStudent($value)
    {
        unset($this->studentsSelected[$value]);
    }
}
