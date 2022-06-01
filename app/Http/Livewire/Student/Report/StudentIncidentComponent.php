<?php

namespace App\Http\Livewire\Student\Report;

use Livewire\Component;
use App\Models\IncidentRecord;
use Illuminate\Support\Facades\Auth;

class StudentIncidentComponent extends Component
{
    public $incidents = [];
    public $user;

    public function render()
    {
        return view('livewire.student.report.student-incident-component');
    }
    public function mount()
    {
        $this->user = Auth::user();
        $this->getReport();
    }

    public function getReport()
    {
        $this->incidents = IncidentRecord::where([
            ['user_id', $this->user->id]
        ])->with('incident')->get();
    }
}
