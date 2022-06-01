<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\IncidentRecord;
use App\Models\Payment;
use App\Models\PaymentRecord;
use App\Constants\Constants;

class AdminDashboardComponent extends Component
{
    // public $testTab;
    public $students, $teachers, $financials, $orientation, $incidents, $incidentsDone, $payments, $paymentsDone;

    public function render()
    {
        return view('livewire.admin.admin-dashboard-component');
    }
    // public function mount(){
    //     $this->testTab = 'pills-profile';
    // }

    public function mount()
    {
        $this->students = User::where('role', Constants::ROLE['ESTUDIANTE'])->count();
        $this->teachers = User::where('role', Constants::ROLE['DOCENTE'])->count();
        $this->financials = User::where('role', Constants::ROLE['FINANCIERO'])->count();
        $this->orientation = User::where('role', Constants::ROLE['ORIENTACION'])->count();
        $this->incidents = IncidentRecord::all()->count();
        $this->incidentsDone = IncidentRecord::where('penalty_done', true)->count();
        $this->payments = Payment::all()->count();
        $this->paymentsDone = PaymentRecord::where('paid', true)->count();
    }
}
