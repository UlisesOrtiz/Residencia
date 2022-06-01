<?php

namespace App\Http\Livewire\Admin\Mark;

use Livewire\Component;
use App\Models\Mark;
use App\Models\MyClass;
use App\Models\Section;
use App\Models\Subject;

class MarkFinalComponent extends Component
{
    public $classes = [], $sections = [], $subjects = [];
    public $myClassId = '', $sectionId = '', $subjectId = '';
    public $sectionData;
    public $sectionIdFilter = '', $subjectIdFilter = '';

    public function render()
    {
        return view('livewire.admin.mark.mark-final-component');
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
        $counter = 0;
        $this->sectionIdFilter = $this->sectionId;
        $this->subjectIdFilter = $this->subjectId;

        $marks = Mark::where([
            ['marks.section_id', $this->sectionIdFilter],
            ['marks.subject_id', $this->subjectIdFilter]
        ])->get();

        foreach ($marks as $mark) {
            if (is_null($mark->final_mark)) {
                isset($mark->first_mark) ? $counter++ : null;
                isset($mark->second_mark) ? $counter++ : null;
                isset($mark->third_mark) ? $counter++ : null;
                if ($counter >= 3) {
                    $mark->final_mark = round(($mark->first_mark + $mark->second_mark + $mark->third_mark) / 3, 0);
                    $mark->save();
                }
            }
            $counter = 0;
        }

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
