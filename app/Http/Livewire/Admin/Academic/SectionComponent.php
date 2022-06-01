<?php

namespace App\Http\Livewire\Admin\Academic;

use Livewire\Component;
use App\Models\MyClass;
use App\Models\Section;
use App\Helpers\ModelHelper;
use Illuminate\Support\Facades\Validator;

class SectionComponent extends Component
{
    public $stateInit = ['my_class_id' => '', 'semester' => '', 'time' => ''];
    protected $listeners = ['editSection', 'deleteSection', 'callConfirmationSection'];
    public $modal = false;
    public $state;
    public $classes;

    public function render()
    {
        return view('livewire.admin.academic.section-component');
    }

    public function mount()
    {
        $this->classes = MyClass::all();
        $this->state = $this->stateInit;
    }

    public function save()
    {
        $idValidator = array_key_exists('id', $this->state) ? $this->state['id'] : '';

        $validateData = Validator::make($this->state, [
            'name' => 'required|unique:sections,name,' . $idValidator,
            'my_class_id' => 'required',
            'semester' => 'required',
            'time' => 'required'
        ])->validate();

        $validateData['name'] = mb_strtoupper($validateData['name'], 'UTF-8');

        Section::updateOrCreate(['id' => $idValidator], $validateData);

        $this->launchModal();
        $this->sendMessage($idValidator ? 'actualizado' : 'creado');
    }

    public function editSection(int $id)
    {
        $this->state = ModelHelper::modelToArray(Section::class, $id);
        $this->launchModal();
    }

    public function callConfirmationSection($id)
    {
        $section = ModelHelper::findModel(Section::class, $id);
        $this->dispatchBrowserEvent('confirmation', [
            'name' => $section->name,
            'id' => $section->id,
            'event' => 'deleteSection',
        ]);
    }

    public function deleteSection(int $id)
    {
        Section::find($id)->delete();
        $this->sendMessage('eliminado');
    }

    public function launchModal()
    {
        $this->modal = !$this->modal;
        $this->dispatchBrowserEvent('openModal', ['modal' => $this->modal]);
    }

    public function sendMessage(string $message)
    {
        $this->dispatchBrowserEvent('message', [
            'message' => "Grupo {$message} correctamente",
            'type' => 'success'
        ]);

        $this->emit('refreshLivewireDatatable');
        $this->state = $this->stateInit;
    }
}
