<?php

namespace App\Http\Livewire\Admin\Mark;

use Livewire\Component;
use App\Models\Mark;
use App\Models\MyClass;
use App\Models\Section;
use App\Models\Subject;
use App\Models\StudentRecord;

class MarkFinalSectionComponent extends Component
{
    public $classes = [], $sections = [], $subjects = [], $students = [];
    public $myClassId = '', $sectionId = '', $subjectId = '';
    public $sectionData;
    public $sectionIdFilter = '', $subjectIdFilter = '';
    public $studentSelected = [];
    public $tab;
    public $studentState = [];

    public function render()
    {
        return view('livewire.admin.mark.mark-final-section-component');
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
        $sectionFilter = Section::find($this->sectionId);
        $this->subjects = Subject::where([
            ['my_class_id', $this->myClassId],
            ['time', $sectionFilter->time],
            ['semester', $sectionFilter->semester]
        ])->orderBy('id')->get();
    }

    public function getData()
    {
        $this->getStudent();
        $this->tab = 'pills-home';
        $this->sectionIdFilter = $this->sectionId;
    }

    public function setStudent($student)
    {
        $this->studentSelected = $student;
        $this->getStudent();

        foreach ($this->studentSelected['marks'] as $mark) {
            $this->studentState[strval($mark['id'])] = $mark['final_mark'];
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

    public function saveMarks(){
        foreach($this->studentState as $key=> $mark){
            if(!is_null($mark)){
                $markEdit = Mark::find($key);
                $markEdit->final_mark = $mark;
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
        $this->getData();
        $this->studentState = [];
        $this->studentSelected = [];
    }
}
