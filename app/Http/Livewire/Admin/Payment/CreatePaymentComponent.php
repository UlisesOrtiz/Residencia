<?php

namespace App\Http\Livewire\Admin\Payment;

use Livewire\Component;
use App\Models\Section;
use App\Models\Payment;
use App\Models\PaymentRecord;
use App\Helpers\StudentRecordHelper;

class CreatePaymentComponent extends Component
{
    protected $listeners = ['addSection', 'removeSection'];
    public $paymentId = '';
    public $sections = [], $payments = [];
    public $sectionsSelected = [];

    public function render()
    {
        return view('livewire.admin.payment.create-payment-component');
    }

    public function mount()
    {
        $this->sections = Section::all();
        $this->payments = Payment::all();
    }

    public function payment()
    {
        $paymentInfo = Payment::find($this->paymentId);
        foreach ($this->sectionsSelected as $section) {
            $students = StudentRecordHelper::hasStudents($section);
            foreach ($students as $student) {
                $date = date('dmY');
                $time = date("His");
                $ref =  "$student->user_id-$date-$time-$this->paymentId";
                PaymentRecord::create([
                    'payment_id' => $this->paymentId,
                    'user_id' => $student->user_id,
                    'ref_no' => $ref,
                    'amt_paid' => 0,
                    'balance' => $paymentInfo->amount,
                    'paid' => 0,
                    'year' => date('Y')
                ]);
            }
        }

        $this->dispatchBrowserEvent('message', [
            'message' => "Pago generado correctamente",
            'type' => 'success'
        ]);

        $this->dispatchBrowserEvent('clearSelect2', [
            'id' => "sectionsSelected"
        ]);
        $this->paymentId = '';
        $this->sectionsSelected = [];
    }

    public function addSection($value)
    {
        $idValidator = array_key_exists($value, $this->sectionsSelected);
        if (!$idValidator) $this->sectionsSelected[$value] = $value;
    }

    public function removeSection($value)
    {
        unset($this->sectionsSelected[$value]);
    }
}
