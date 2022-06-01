<?php

namespace App\Http\Livewire\Admin\Report;

use Livewire\Component;
use App\Models\Mark;
use App\Models\MyClass;
use App\Models\Section;
use App\Models\Subject;
use App\Models\StudentRecord;
use App\Constants\Constants;

class SectionReportAttendanceComponent extends Component
{
    public $classes = [], $sections = [], $subjects = [], $students = [];
    public $myClassId = '', $sectionId = '', $subjectId = '', $phaseId = '';
    public $sectionData;
    public $sectionIdFilter = '', $phaseIdFilter = '';
    public $phases = [];

    public function render()
    {
        return view('livewire.admin.report.section-report-attendance-component');
    }

    public function mount()
    {
        $this->classes = MyClass::all();
        $this->phases = Constants::PHASE;
    }

    public function changeClass()
    {
        $this->students = [];
        $this->sections = Section::where('my_class_id', $this->myClassId)->get();
    }

    public function getSubjects()
    {
        $this->sectionIdFilter = '';
        $sectionFilter = Section::find($this->sectionId);
        $this->subjects = Subject::where([
            ['my_class_id', $this->myClassId],
            ['time', $sectionFilter->time],
            ['semester', $sectionFilter->semester]
        ])->orderBy('id')->get();
    }

    public function getData()
    {
        $this->phaseIdFilter = '';
        $this->phaseIdFilter = $this->phaseId;
        if ($this->phaseIdFilter == '') {
            $this->dispatchBrowserEvent('message', [
                'message' => "Debes seleccionar un período",
                'type' => 'error'
            ]);
        }
        $this->getStudent();
        $this->sectionIdFilter = $this->sectionId;
    }

    public function getStudent()
    {
        $sectionData = Section::find($this->sectionId);
        $sections = StudentRecord::where('section_id', $this->sectionId)->get();
        $c = 0;

        foreach ($sections as $section) {
            $this->students[$c]['stu'] = $section;
            $this->students[$c]['marks'] =
                Mark::where([
                    ['user_id', $section->user->id],
                    ['semester', $sectionData->semester]
                ])->orderBy('subject_id')->with('subject')->get();;
            $c++;
        }
    }
}
