<?php

namespace App\Http\Livewire\Tables\Admin\Mark;

use App\Models\Mark;
use App\Models\Section;
use App\Models\Subject;
use Mediconesystems\LivewireDatatables\Action;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class MarkSectionFinalTable extends LivewireDatatable
{
    public $model = Mark::class;
    public $sectionId = '', $subjectId = '';
    public $hideable = "select";

    public function builder()
    {
        $data = [["name" => 'Mike']];
        return $data;
    }

    public function columns()
    {
    }

    public function buildActions()
    {
    }
}
