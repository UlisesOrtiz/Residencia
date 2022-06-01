<?php

namespace App\Http\Livewire\Admin\Student;

use Livewire\Component;
use App\Models\MyClass;
use App\Models\Section;

class ViewSectionComponent extends Component
{
    public $classes = [];
    public $sections = [];
    public $myClassId = '';
    public $sectionId = '';
    public $sectionIdFilter = '';
    public $sectionData;

    public function render()
    {
        return view('livewire.admin.student.view-section-component');
    }

    public function mount()
    {
        $this->classes = MyClass::all();
    }

    public function changeClass()
    {
        $this->sections = Section::where('my_class_id', $this->myClassId)->get();
    }

    public function getSection(){
        $this->sectionIdFilter = '';
    }

    public function getData(){
        $this->sectionIdFilter = $this->sectionId;
        $this->emit('refreshLivewireDatatable');
    }
}
