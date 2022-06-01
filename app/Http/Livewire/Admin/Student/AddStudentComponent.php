<?php

namespace App\Http\Livewire\Admin\Student;

use Livewire\Component;
use App\Models\User;
use App\Models\MyClass;
use App\Models\Section;
use App\Helpers\MarkHelper;
use App\Constants\Constants;
use App\Models\StudentRecord;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AddStudentComponent extends Component
{
    public $stateInit = [
        'blood_group' => '',
        'gender' => '',
        'my_class_id' => '',
        'time' => '',
        'period' => '',
        'section_id' => ''
    ];

    protected $listeners = ['editStudent', 'deleteStudent', 'callConfirmationStudent'];
    public $modal = false;
    public $state;
    public $bloodType;
    public $genders;
    public $periods;
    public $classes = [];
    public $sections = [];

    public function render()
    {
        return view('livewire.admin.student.add-student-component');
    }

    public function mount()
    {
        $this->state = $this->stateInit;
        $this->classes = MyClass::all();
        $this->bloodType = Constants::BLOOD_GROUP;
        $this->periods = Constants::PERIOD;
        $this->genders = Constants::GENDER;
    }

    public function save()
    {
        $idValidator = array_key_exists('user_id', $this->state) ? $this->state['user_id'] : '';

        $validateData = Validator::make($this->state, [
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $idValidator,
            'password' => 'required',
            'gender' => 'required',
            'control_number' => 'required|unique:users,control_number,' . $idValidator,
            'address' => '',
            'phone' => 'required',
            'telephone' => '',
            'birthday' => 'required',
            'health_issues' => '',
            'blood_group' => 'required',
            'section_id' => 'required',
            'period' => 'required',
        ])->validate();

        $validateData['name'] = mb_strtoupper($validateData['name'], 'UTF-8');
        $validateData['role'] = Constants::ROLE['ESTUDIANTE'];
        $validateData['password'] = Hash::make($validateData['password']);

        $user = User::updateOrCreate(['id' => $idValidator], $validateData);

        if (!$idValidator) {
            //Create student record
            MarkHelper::createStudentRecord(
                $user->id,
                $this->state['my_class_id'],
                $this->state['section_id'],
                $this->state['period']
            );

            MarkHelper::createMarks(
                $user->id,
                $this->state['my_class_id'],
                $this->state['section_id'],
                $this->state['period']
            );
        }

        $this->launchModal();
        $this->sendMessage($idValidator ? 'actualizado' : 'creado');
    }

    public function editStudent(int $id)
    {
        $this->state = $this->stateInit;
        $student = $this->findStudent($id);
        $this->state['my_class_id'] = $student->my_class_id;
        $this->changeClass();
        $this->state = $student->toArray();
        $this->launchModal();
    }

    public function callConfirmationStudent($id)
    {
        $specialty = $this->findStudent($id);
        $this->dispatchBrowserEvent('confirmation', [
            'name' => $specialty->name,
            'id' => $specialty->id,
            'event' => 'deleteStudent',
        ]);
    }

    public function deleteStudent(int $id)
    {
        User::find($id)->delete();
        $this->sendMessage('eliminado');
    }

    public function launchModal()
    {
        $this->modal = !$this->modal;
        $this->state['password'] = substr(md5(mt_rand()), 0, 4);
        $this->dispatchBrowserEvent('openModal', ['modal' => $this->modal]);
    }

    public function sendMessage(string $message)
    {
        $this->dispatchBrowserEvent('message', [
            'message' => "Estudiante {$message} correctamente",
            'type' => 'success'
        ]);

        $this->emit('refreshLivewireDatatable');
        $this->state = $this->stateInit;
    }

    public function findStudent($id)
    {
        return StudentRecord::where('user_id', $id)->join('users', 'users.id', 'student_records.user_id')->first();
    }

    public function changeClass()
    {
        $this->sections = Section::where('my_class_id', $this->state['my_class_id'])->get();
    }

    public function closeModal()
    {
        $this->modal = false;
        $this->state = $this->stateInit;
    }
}
