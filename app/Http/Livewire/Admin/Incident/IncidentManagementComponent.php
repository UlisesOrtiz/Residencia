<?php

namespace App\Http\Livewire\Admin\Incident;

use Livewire\Component;
use App\Models\MyClass;
use App\Models\Section;
use App\Models\StudentRecord;
use App\Models\IncidentRecord;

class IncidentManagementComponent extends Component
{
    public $classes = [], $sections = [], $students = [];
    public $myClassId = '', $sectionId = '', $subjectId = '';
    public $sectionData;
    public $sectionIdFilter = '', $subjectIdFilter = '';
    public $studentSelected = [];
    public $tab;
    public $studentState = [];

    public function render()
    {
        return view('livewire.admin.incident.incident-management-component');
    }

    public function mount()
    {
        $this->tab = 'pills-home';
        $this->classes = MyClass::all();
    }

    public function changeClass()
    {
        $this->sections = Section::where('my_class_id', $this->myClassId)->get();
    }

    public function getSubjects()
    {
        $this->sectionIdFilter = '';
    }

    public function getData()
    {
        $this->getStudent();
        $this->tab = 'pills-home';
        $this->sectionIdFilter = $this->sectionId;
    }

    public function setStudent($student)
    {
        $this->studentState = [];
        $this->studentSelected = $student;
        $this->getStudent();

        foreach ($this->studentSelected['incidents'] as $incident) {
            $this->studentState[strval($incident['id'])]['checkbox'] = false;
        }

        $this->tab = 'pills-profile';
    }

    public function getStudent()
    {
        $this->students = [];
        $sections = StudentRecord::where('section_id', $this->sectionId)->get();
        $c = 0;
        foreach ($sections as $section) {
            $this->students[$c]['stu'] = $section;
            $this->students[$c]['incidents'] =
                IncidentRecord::where([
                    ['user_id', $section->user->id],
                ])->orderBy('created_at')->with('incident')->get();;
            $c++;
        }
    }

    public function saveIncidents()
    {
        foreach ($this->studentState as $key => $incident) {
            if ($incident['checkbox']) {
                $incidentEdit = IncidentRecord::find($key);
                $incidentEdit->penalty_done = true;
                $incidentEdit->save();
            }
        }
        $this->setInit();
    }

    public function setInit()
    {
        $this->getStudent();
        $this->dispatchBrowserEvent('message', [
            'message' => "Incidentes actualizados correctamente",
            'type' => 'success'
        ]);
        $this->getData();
        $this->studentState = [];
        $this->studentSelected = [];
    }
}
