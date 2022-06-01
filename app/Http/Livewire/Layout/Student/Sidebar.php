<?php

namespace App\Http\Livewire\Layout\Student;

use Request;
use Livewire\Component;
use Illuminate\Support\Facades\Route;

class Sidebar extends Component
{
    public $prefix, $segments, $routeName, $lastSegment;

    public function render()
    {
        return view('livewire.layout.student.sidebar');
    }

    public function mount()
    {
        $this->prefix = request()->route()->getPrefix();
        $this->segments = Request::segments();
        $this->routeName = Route::currentRouteName();
        $this->lastSegment = last($this->segments);
    }

    public function openMenu($route)
    {
        $prefix = request()->route()->getPrefix();
        return str_contains($prefix, $route) ? 'menu-is-opening menu-open' : '';
    }
}
