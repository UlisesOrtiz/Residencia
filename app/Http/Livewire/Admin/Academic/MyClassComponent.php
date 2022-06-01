<?php

namespace App\Http\Livewire\Admin\Academic;

use Livewire\Component;
use App\Models\MyClass;
use App\Helpers\ModelHelper;
use Illuminate\Support\Facades\Validator;

class MyClassComponent extends Component
{
    protected $listeners = ['editMyClass', 'deleteMyClass', 'callConfirmationMyClass'];
    public $modal = false;
    public $state = [];

    public function render()
    {
        return view('livewire.admin.academic.my-class-component');
    }

    public function save()
    {
        $idValidator = array_key_exists('id', $this->state) ? $this->state['id'] : '';

        $validateData = Validator::make($this->state, $this->rules($idValidator))->validate();

        $validateData['name'] = mb_strtoupper($validateData['name'], 'UTF-8');

        MyClass::updateOrCreate(['id' => $idValidator], $validateData);

        $this->launchModal();
        $this->sendMessage($idValidator ? 'actualizada' : 'creada');
    }

    public function editMyClass(int $id)
    {
        $this->state = ModelHelper::modelToArray(MyClass::class, $id);
        $this->launchModal();
    }

    public function callConfirmationMyClass($id)
    {
        $class = ModelHelper::findModel(MyClass::class, $id);
        $this->dispatchBrowserEvent('confirmation', [
            'name' => $class->name,
            'id' => $class->id,
            'event' => 'deleteMyClass',
        ]);
    }

    public function deleteMyClass(int $id)
    {
        MyClass::find($id)->delete();
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
            'message' => "Especialidad {$message} correctamente",
            'type' => 'success'
        ]);
        $this->emit('refreshLivewireDatatable');
        $this->state = [];
    }

    public function rules($idValidator): array
    {
        return [
            'name' => 'required|unique:my_classes,name,' . $idValidator,
        ];
    }
}
