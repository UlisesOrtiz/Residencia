<?php

namespace App\Http\Livewire\Admin\Payment;

use Livewire\Component;
use App\Models\Payment;
use App\Helpers\ModelHelper;
use Illuminate\Support\Facades\Validator;

class CatalogueComponent extends Component
{
    protected $listeners = ['editPayment', 'deletePayment', 'callConfirmationPayment'];
    public $modal = false;
    public $state = [];

    public function render()
    {
        return view('livewire.admin.payment.catalogue-component');
    }

    public function save()
    {
        $idValidator = array_key_exists('id', $this->state) ? $this->state['id'] : '';

        $validateData = Validator::make($this->state, $this->rules())->validate();

        $validateData['title'] = mb_strtoupper($validateData['title'], 'UTF-8');
        Payment::updateOrCreate(['id' => $idValidator], $validateData);

        $this->launchModal();
        $this->sendMessage($idValidator ? 'actualizado' : 'creado');
    }

    public function editPayment(int $id)
    {
        $this->state = ModelHelper::modelToArray(Payment::class, $id);
        $this->launchModal();
    }

    public function callConfirmationPayment($id)
    {
        $payment = ModelHelper::findModel(Payment::class, $id);
        $this->dispatchBrowserEvent('confirmation', [
            'name' => $payment->title,
            'id' => $payment->id,
            'event' => 'deletePayment',
        ]);
    }

    public function deletePayment(int $id)
    {
        Payment::find($id)->delete();
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
            'message' => "Pago {$message} correctamente",
            'type' => 'success'
        ]);

        $this->emit('refreshLivewireDatatable');
        $this->state = [];
    }

    public function rules(): array
    {
        return [
            'title' => 'required',
            'amount' => 'required',
        ];
    }
}
