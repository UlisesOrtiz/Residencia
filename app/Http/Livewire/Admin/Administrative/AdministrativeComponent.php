<?php

namespace App\Http\Livewire\Admin\Administrative;

use Livewire\Component;
use App\Models\User;
use App\Constants\Constants;
use App\Helpers\ModelHelper;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdministrativeComponent extends Component
{
    public $stateInit = ['blood_group' => '', 'gender' => '', 'role' => ''];
    protected $listeners = ['editAdministrative', 'deleteAdministrative', 'callConfirmationAdministrative'];
    public $modal = false;
    public $state;
    public $bloodType, $genders;
    protected $eventHelper;

    public function render()
    {
        return view('livewire.admin.administrative.administrative-component');
    }

    public function mount()
    {
        $this->state = $this->stateInit;
        $this->bloodType = Constants::BLOOD_GROUP;
        $this->genders = Constants::GENDER;
        $this->roles = Constants::ROLE_FILTER;
    }

    public function save()
    {
        $idValidator = array_key_exists('id', $this->state) ? $this->state['id'] : '';

        $validateData = Validator::make($this->state, [
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $idValidator,
            'password' => 'required',
            'gender' => 'required',
            'address' => '',
            'phone' => 'required',
            'telephone' => '',
            'birthday' => 'required',
            'health_issues' => '',
            'blood_group' => 'required',
            'role' => 'required',
        ])->validate();

        $validateData['name'] = mb_strtoupper($validateData['name'], 'UTF-8');
        $validateData['password'] = Hash::make($validateData['password']);

        User::updateOrCreate(['id' => $idValidator], $validateData);

        $this->launchModal();
        $this->sendMessage($idValidator ? 'actualizado' : 'creado');
    }

    public function editAdministrative(int $id)
    {
        $this->state = ModelHelper::modelToArray(User::class, $id);
        $this->launchModal();
    }

    public function callConfirmationAdministrative($id)
    {
        $administrative = ModelHelper::findModel(User::class, $id);
        $this->dispatchBrowserEvent('confirmation', [
            'name' => $administrative->name,
            'id' => $administrative->id,
            'event' => 'deleteAdministrative',
        ]);
    }

    public function deleteAdministrative(int $id)
    {
        User::find($id)->delete();
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
            'message' => "Administrativo {$message} correctamente",
            'type' => 'success'
        ]);
        $this->emit('refreshLivewireDatatable');
        $this->state = $this->stateInit;
    }
}
