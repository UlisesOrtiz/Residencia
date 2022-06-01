<?php

namespace App\Http\Livewire\Admin\Marksheet;

use Livewire\Component;
use App\Models\Mark;
use App\Models\Section;
use App\Models\MyClass;
use App\Models\StudentRecord;

class MarksheetStudentComponent extends Component
{
    public $state = [
        'myClassId' => '', 'sectionId' => '', 'userId' => '', 'userIdFilter' => ''
    ];
    public $classes = [], $sections = [], $students = [], $marks;
    public $studentData;
    public $studentSelected;

    public function render()
    {
        return view('livewire.admin.marksheet.marksheet-student-component');
    }

    public function mount()
    {
        $this->classes = MyClass::all();
    }

    public function changeClass()
    {
        $this->sections = Section::where('my_class_id', $this->state['myClassId'])->get();
    }

    public function getStudents()
    {
        $this->state['userId'] = '';
        $this->getRecords();
    }

    public function getReport()
    {
        $this->marks = Mark::where('user_id', $this->state['userId'])->get();
        $this->studentSelected = StudentRecord::where([
            ['my_class_id', $this->state['myClassId']],
            ['section_id', $this->state['sectionId']],
            ['user_id', $this->state['userId']],
        ])->first();
    }

    public function getRecords()
    {
        $this->students = StudentRecord::where([
            ['my_class_id', $this->state['myClassId']],
            ['section_id', $this->state['sectionId']],
        ])->get();
    }

    public function cleanData()
    {
        $this->state['userId'] = '';
        $this->marks = [];
        $this->studentSelected = null;
        $this->students = [];
    }
}
