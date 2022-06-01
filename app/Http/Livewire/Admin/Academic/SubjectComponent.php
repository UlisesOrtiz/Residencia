<?php

namespace App\Http\Livewire\Admin\Academic;

use Livewire\Component;
use App\Models\User;
use App\Models\Mark;
use App\Models\MyClass;
use App\Models\Subject;
use App\Models\Section;
use App\Helpers\MarkHelper;
use App\Helpers\ModelHelper;
use App\Constants\Constants;
use Illuminate\Support\Facades\Validator;

class SubjectComponent extends Component
{
    protected $listeners = ['editSubject', 'deleteSubject', 'callConfirmationSubject'];
    public $modal = false;
    public $state;
    public $stateInit =
    [
        'my_class_id' => '', 'semester' => '',
        'time' => '', 'teacher_id' => '', 'section_id' => ''
    ];
    public $classes, $teachers, $times;
    public $sections = [];

    public function render()
    {
        return view('livewire.admin.academic.subject-component');
    }

    public function mount()
    {
        $this->classes = MyClass::all();
        $this->teachers = User::where('role', 'teacher')->get();
        $this->times = Constants::TIME;
        $this->state = $this->stateInit;
    }

    public function save()
    {
        $idValidator = array_key_exists('id', $this->state) ? $this->state['id'] : '';

        $validateData = Validator::make($this->state, [
            'name' => 'required',
            'slug' => 'required',
            'my_class_id' => 'required',
            'section_id' => 'required',
            'teacher_id' => 'required',
            'time' => 'required',
            'semester' => 'required'
        ])->validate();

        $validateData['name'] = mb_strtoupper($validateData['name'], 'UTF-8');

        $subject = Subject::updateOrCreate(['id' => $idValidator], $validateData);
        $this->state['id'] = $subject->id;
        $this->verifyStudents();

        $this->launchModal();
        $this->sendMessage($idValidator ? 'actualizada' : 'creada');
    }

    public function changeClass()
    {
        $this->sections = Section::where('my_class_id', $this->state['my_class_id'])->get();
    }

    public function getTime()
    {
        $section = ModelHelper::findModel(Section::class, $this->state['section_id']);
        $this->state['time'] = $section->time;
        $this->state['semester'] = $section->semester;
    }

    public function editSubject(int $id)
    {
        $this->state = ModelHelper::modelToArray(Subject::class, $id);
        $this->changeClass();
        $this->launchModal();
    }

    public function callConfirmationSubject($id)
    {
        $subject = ModelHelper::findModel(Subject::class, $id);
        $this->dispatchBrowserEvent('confirmation', [
            'name' => $subject->name . '. Se eliminará todas las calificaciones de esta materia.',
            'id' => $subject->id,
            'event' => 'deleteSubject',
        ]);
    }

    public function deleteSubject(int $id)
    {
        Subject::find($id)->delete();
        Mark::where('subject_id', $id)->delete();
        $this->sendMessage('eliminada');
    }

    public function launchModal()
    {
        $this->modal = !$this->modal;
        $this->dispatchBrowserEvent('openModal', ['modal' => $this->modal]);
    }

    public function sendMessage(string $message)
    {
        $this->dispatchBrowserEvent('message', [
            'message' => "Materia {$message} correctamente",
            'type' => 'success'
        ]);
        $this->emit('refreshLivewireDatatable');
        $this->state = $this->stateInit;
    }

    public function verifyStudents()
    {
        $students = MarkHelper::hasStudents($this->state['section_id']);
        if (count($students) > 0) $this->addNewSubject();
    }

    public function addNewSubject()
    {
        MarkHelper::addNewSubject(
            $this->state['id'],
            $this->state['section_id'],
            $this->state['semester']
        );
    }
}
