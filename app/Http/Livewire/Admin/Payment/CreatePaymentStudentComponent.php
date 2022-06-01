<?php

namespace App\Http\Livewire\Admin\Payment;

use Livewire\Component;
use App\Models\User;
use App\Models\Payment;
use App\Constants\Constants;
use App\Models\PaymentRecord;

class CreatePaymentStudentComponent extends Component
{
    protected $listeners = ['addStudent', 'removeStudent'];
    public $paymentId = '';
    public $students = [], $payments = [];
    public $studentsSelected = [];

    public function render()
    {
        return view('livewire.admin.payment.create-payment-student-component');
    }
    public function mount()
    {
        $this->students = User::where('role', Constants::ROLE['ESTUDIANTE'])->get();
        $this->payments = Payment::all();
    }

    public function payment()
    {
        $paymentInfo = Payment::find($this->paymentId);
        foreach ($this->studentsSelected as $student) {
            $date = date('dmY');
            $time = date("His");
            $ref =  "$student-$date-$time-$this->paymentId";
            PaymentRecord::create([
                'payment_id' => $this->paymentId,
                'user_id' => $student,
                'ref_no' => $ref,
                'amt_paid' => 0,
                'balance' => $paymentInfo->amount,
                'paid' => 0,
                'year' => date('Y')
            ]);
        }

        $this->dispatchBrowserEvent('message', [
            'message' => "Pago generado correctamente",
            'type' => 'success'
        ]);

        $this->dispatchBrowserEvent('clearSelect2', [
            'id' => "studentsSelected"
        ]);
        $this->paymentId = '';
        $this->studentsSelected = [];
    }

    public function addStudent($value)
    {
        $idValidator = array_key_exists($value, $this->studentsSelected);
        if (!$idValidator) $this->studentsSelected[$value] = $value;
    }

    public function removeStudent($value)
    {
        unset($this->studentsSelected[$value]);
    }
}
