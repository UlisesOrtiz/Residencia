<?php

namespace App\Http\Livewire\Teacher\Mark;

use Livewire\Component;
use App\Models\MyClass;
use App\Models\Section;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;

class TeacherMarkComponent extends Component
{
    public $classes = [], $sections = [], $subjects = [];
    public $myClassId = '', $sectionId = '', $subjectId = '';
    public $sectionData;
    public $sectionIdFilter = '', $subjectIdFilter = '';
    public $user;

    public function render()
    {
        return view('livewire.teacher.mark.teacher-mark-component');
    }

    public function mount()
    {
        $this->user = Auth::user();
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
            ['teacher_id', $this->user->id],
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
