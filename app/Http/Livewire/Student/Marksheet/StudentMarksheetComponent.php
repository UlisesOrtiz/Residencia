<?php

namespace App\Http\Livewire\Student\Marksheet;

use Livewire\Component;
use App\Models\Mark;
use Illuminate\Support\Facades\Auth;

class StudentMarksheetComponent extends Component
{
    public $marks = [];
    public $user;

    public function render()
    {
        return view('livewire.student.marksheet.student-marksheet-component');
    }

    public function mount()
    {
        $this->user = Auth::user();
        $this->getReport();
    }

    public function getReport()
    {
        $this->marks = Mark::where([
            ['user_id', $this->user->id],
            ['status', true]
        ])->get();
    }
}
