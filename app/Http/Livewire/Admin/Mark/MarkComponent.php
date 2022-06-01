<?php

namespace App\Http\Livewire\Admin\Mark;

use Livewire\Component;
use App\Models\MyClass;
use App\Models\Section;
use App\Models\Subject;

class MarkComponent extends Component
{
    public $classes = [], $sections = [], $subjects = [];
    public $myClassId = '', $sectionId = '', $subjectId = '';
    public $sectionData;
    public $sectionIdFilter = '', $subjectIdFilter = '';

    public function render()
    {
        return view('livewire.admin.mark.mark-component');
    }

    public function mount()
    {
        $this->classes = MyClass::all();
    }

    public function changeClass()
    {
        $this->sections = Section::where('my_class_id', $this->myClassId)->get();
    }

    public function getSubjects()
    {
        $this->sectionIdFilter = '';
        $this->subjectIdFilter = '';
        $sectionFilter = Section::find($this->sectionId);
        $this->subjects = Subject::where([
            ['my_class_id', $this->myClassId],
            ['time', $sectionFilter->time],
            ['semester', $sectionFilter->semester]
        ])->get();
    }

    public function getMarks()
    {
        $this->sectionIdFilter = $this->sectionId;
        $this->subjectIdFilter = $this->subjectId;
        $this->emit('refreshLivewireDatatable');
    }

    public function cleanFilters()
    {
        $this->sectionIdFilter = '';
        $this->subjectIdFilter = '';
    }
}
