<?php

namespace App\Http\Livewire\Admin\Mark;

use Livewire\Component;
use App\Models\Mark;
use App\Models\MyClass;
use App\Models\Section;
use App\Models\Subject;
use App\Models\StudentRecord;
use App\Constants\Constants;

class MarkSectionComponent extends Component
{
    public $classes = [], $sections = [], $subjects = [], $students = [];
    public $myClassId = '', $sectionId = '', $subjectId = '', $phaseId = '';
    public $sectionData;
    public $sectionIdFilter = '', $subjectIdFilter = '', $phaseIdFilter = '';
    public $studentSelected = [];
    public $phases = [];
    public $tab;
    public $studentState = [];

    public function render()
    {
        return view('livewire.admin.mark.mark-section-component');
    }

    public function mount()
    {
        $this->tab = 'pills-home';
        $this->classes = MyClass::all();
        $this->phases = Constants::PHASE;
    }

    public function changeClass()
    {
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
        $this->tab = 'pills-home';
        $this->sectionIdFilter = $this->sectionId;
    }

    public function setStudent($student)
    {
        $this->studentSelected = $student;
        $this->getStudent();

        foreach ($this->studentSelected['marks'] as $mark) {
            $phaseSelected = $this->phaseIdFilter;
            $markValue = $phaseSelected  == 1
                ? $mark['first_mark']
                : ($phaseSelected  == 2 ? $mark['second_mark']
                    : $mark['third_mark']);

            $attendanceValue = $phaseSelected  == 1
                ? $mark['first_attendance']
                : ($phaseSelected  == 2 ? $mark['second_attendance']
                    : $mark['third_attendance']);

            $this->studentState[strval($mark['id'])]['attendance'] = $attendanceValue;
            $this->studentState[strval($mark['id'])]['mark'] = $markValue;
        }

        $this->tab = 'pills-profile';
    }

    public function getStudent()
    {
        $sectionData = Section::find($this->sectionId);
        $students = [];
        $sections = StudentRecord::where('section_id', $this->sectionId)->get();
        $c = 0;
        foreach ($sections as $section) {
            $students[$c]['stu'] = $section;
            $students[$c]['marks'] =
                Mark::where([
                    ['user_id', $section->user->id],
                    ['semester', $sectionData->semester]
                ])->orderBy('subject_id')->with('subject')->get();;
            $c++;
        }
        $this->students = $students;
    }

    public function saveMarks()
    {
        foreach ($this->studentState as $key => $mark) {
  
            $markEdit = Mark::find($key);
            $phaseSelected = $this->phaseIdFilter;

            if (!is_null($mark['mark'])) {
                $markValue = $phaseSelected  == 1
                    ? 'first_mark'
                    : ($phaseSelected  == 2 ? 'second_mark'
                        : 'third_mark');
                $markEdit->{$markValue} = $mark['mark'];
                $markEdit->save();
            }

            if (!is_null($mark['attendance'])) {
                $attendanceValue = $phaseSelected  == 1
                    ? 'first_attendance'
                    : ($phaseSelected  == 2 ? 'second_attendance'
                    : 'third_attendance');

                $markEdit->{$attendanceValue} = $mark['attendance'];
                $markEdit->save();
            }
        }
        $this->setInit();
    }

    public function setInit()
    {
        $this->getStudent();
        $this->dispatchBrowserEvent('message', [
            'message' => "Materias actualizadas correctamente",
            'type' => 'success'
        ]);
        $this->tab = 'pills-home';
        $this->studentState = [];
        $this->studentSelected = [];
        $this->sectionIdFilter = '';
        $this->phaseIdFilter = '';
    }
}
