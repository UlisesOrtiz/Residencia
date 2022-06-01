<?php

namespace App\Http\Livewire\Admin\Student;

use Livewire\Component;
use App\Models\Mark;
use App\Models\MyClass;
use App\Models\Section;
use App\Helpers\MarkHelper;
use App\Models\StudentRecord;

class StudentPromotionComponent extends Component
{
    protected $listeners = ['promoteStudents'];
    public $classes = [], $sections = [], $students = [], $sectionPromotion = [], $promotionState = [];
    public $myClassId = '', $sectionId = '', $sectionPromotionId = '';
    public $sectionIdFilter = '', $sectionPromotionIdFilter = '';

    public function render()
    {
        return view('livewire.admin.student.student-promotion-component');
    }

    public function mount()
    {
        $this->classes = MyClass::all();
    }

    public function changeClass()
    {
        $this->sections = Section::where('my_class_id', $this->myClassId)->get();
    }

    public function getSectionPromotion()
    {
        $this->sectionIdFilter = '';
        $sectionFilter = Section::find($this->sectionId);

        $this->sectionPromotion = Section::where([
            ['my_class_id', $this->myClassId],
            ['time', $sectionFilter->time],
            ['semester', $sectionFilter->semester + 1]
        ])->orderBy('id')->get();
    }

    public function getData()
    {
        $this->sectionPromotionIdFilter = '';
        $this->sectionPromotionIdFilter = $this->sectionPromotionId;

        if ($this->sectionPromotionIdFilter == '') {
            $this->dispatchBrowserEvent('message', [
                'message' => "Debes seleccionar una sección a promover",
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
            $this->students[$c]['avg'] =
                round(Mark::where([
                    ['user_id', $section->user->id],
                    ['semester', $sectionData->semester]
                ])->avg('final_mark'), 1);

            if (!array_key_exists(strval($section->user->id), $this->promotionState)) {
                $this->promotionState[strval($section->user->id)] = false;
            }
            $c++;
        }
    }

    public function setInit()
    {
        $this->getStudent();
        $this->dispatchBrowserEvent('message', [
            'message' => "Alumnos promovidos",
            'type' => 'success'
        ]);

        $this->myClassId = '';
        $this->sectionId = '';
        $this->sectionIdFilter = '';
        $this->sectionPromotionId = '';
        $this->sectionPromotionIdFilter = '';
        $this->sections = [];
        $this->sectionPromotion = [];
    }

    public function promotion()
    {
        $section = Section::find($this->sectionIdFilter);
        $sectionPromotion = Section::find($this->sectionPromotionIdFilter);
        $this->getStudent();

        $this->dispatchBrowserEvent('promotionConfirmation', [
            'section' => $section->name,
            'sectionPromotion' => $sectionPromotion->name,
            'event' => 'promoteStudents'
        ]);
    }

    public function promoteStudents()
    {
        foreach ($this->promotionState as $key => $promotion) {
            if ($promotion)
                MarkHelper::updateStudentRecord($key, $this->sectionPromotionIdFilter);
        }

        $this->setInit();
    }
}
