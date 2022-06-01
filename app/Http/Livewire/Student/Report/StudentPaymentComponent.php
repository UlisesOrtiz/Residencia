<?php

namespace App\Http\Livewire\Student\Report;

use Livewire\Component;
use App\Models\PaymentRecord;
use Illuminate\Support\Facades\Auth;

class StudentPaymentComponent extends Component
{
    public $payments = [];
    public $user;

    public function render()
    {
        return view('livewire.student.report.student-payment-component');
    }

    public function mount()
    {
        $this->user = Auth::user();
        $this->getReport();
    }

    public function getReport()
    {
        $this->payments = PaymentRecord::where([
            ['user_id', $this->user->id]
        ])->with('payment')->get();
    }
}
