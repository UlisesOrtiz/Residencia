<?php

namespace App\Http\Livewire\Admin\Payment;

use Livewire\Component;
use App\Models\MyClass;
use App\Models\Section;
use App\Models\StudentRecord;
use App\Models\PaymentRecord;

class PaymentManagementComponent extends Component
{
    public $classes = [], $sections = [], $students = [];
    public $myClassId = '', $sectionId = '', $subjectId = '';
    public $sectionData;
    public $sectionIdFilter = '', $subjectIdFilter = '';
    public $studentSelected = [];
    public $tab;
    public $studentState = [];

    public function render()
    {
        return view('livewire.admin.payment.payment-management-component');
    }

    public function mount()
    {
        $this->tab = 'pills-home';
        $this->classes = MyClass::all();
    }

    public function changeClass()
    {
        $this->sections = Section::where('my_class_id', $this->myClassId)->get();
    }

    public function getSubjects()
    {
        $this->sectionIdFilter = '';
    }

    public function getData()
    {
        $this->getStudent();
        $this->tab = 'pills-home';
        $this->sectionIdFilter = $this->sectionId;
    }

    public function setStudent($student)
    {
        $this->studentState = [];
        $this->studentSelected = $student;
        $this->getStudent();

        foreach ($this->studentSelected['payments'] as $payment) {
            $this->studentState[strval($payment['id'])]['balance'] = $payment['balance'];
            $this->studentState[strval($payment['id'])]['ref'] = $payment['ref_no'];
            $this->studentState[strval($payment['id'])]['amountInput'] = 0;
        }

        $this->tab = 'pills-profile';
    }

    public function getStudent()
    {
        $this->students = [];
        $sections = StudentRecord::where('section_id', $this->sectionId)->get();
        $c = 0;
        foreach ($sections as $section) {
            $this->students[$c]['stu'] = $section;
            $this->students[$c]['payments'] =
                PaymentRecord::where([
                    ['user_id', $section->user->id],
                ])->orderBy('created_at')->with('payment')->get();;
            $c++;
        }
    }

    public function savePayments()
    {
        foreach ($this->studentState as $key => $mark) {
            if ($mark['amountInput'] > $mark['balance']) {
                $this->dispatchBrowserEvent('message', [
                    'message' => "El pago con referencia: <b>" . $mark['ref'] . "</b> es mayor al saldo de $" . $mark['balance'],
                    'type' => 'error'
                ]);
                $this->getStudent();
                return;
            }
        }

        foreach ($this->studentState as $key => $mark) {
            if ($mark['amountInput'] > 0) {
                $paymentEdit = PaymentRecord::find($key);
                $paymentEdit->amt_paid = $mark['amountInput'];
                $finalBalance = $mark['balance'] - $mark['amountInput'];
                $paymentEdit->balance = $finalBalance;
                $finalBalance == 0
                    ? $paymentEdit->paid = true
                    : null;
                $paymentEdit->save();
            }
        }
        $this->setInit();
    }

    public function setInit()
    {
        $this->getStudent();
        $this->dispatchBrowserEvent('message', [
            'message' => "Pagos actualizados correctamente",
            'type' => 'success'
        ]);
        $this->getData();
        $this->studentState = [];
        $this->studentSelected = [];
    }
}
