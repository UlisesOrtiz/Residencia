<?php

namespace App\Http\Livewire\Admin\Marksheet;

use Livewire\Component;
use App\Models\Section;
use App\Models\MyClass;
use App\Models\StudentRecord;

class MarksheetSectionComponent extends Component
{
    public $state = [
        'myClassId' => '', 'sectionId' => '',  'userIdFilter' => ''
    ];
    public $classes = [], $sections = [], $students = [], $marks;
    public $studentData;

    public function render()
    {
        return view('livewire.admin.marksheet.marksheet-section-component');
    }

    public function mount()
    {
        $this->classes = MyClass::all();
    }

    public function changeClass()
    {
        $this->sections = Section::where('my_class_id', $this->state['myClassId'])->get();
    }

    public function getReport()
    {
        $this->students = StudentRecord::where([
            ['my_class_id', $this->state['myClassId']],
            ['section_id', $this->state['sectionId']],
        ])->get();
    }

    public function changeSection()
    {
        $this->students = [];
    }
}
