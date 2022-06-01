<?php

namespace App\Http\Livewire\Tables\Admin\Mark;

use App\Models\Mark;
use App\Models\Section;
use App\Models\Subject;
use Mediconesystems\LivewireDatatables\Action;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class MarkFinalTable extends LivewireDatatable
{
    public $model = Mark::class;
    public $sectionId = '', $subjectId = '';
    public $hideable = "select";

    public function builder()
    {
        return Mark::join('subjects', 'subjects.id', 'marks.subject_id')
            ->join('users', 'users.id', 'marks.user_id')
            ->where([
                ['marks.section_id', $this->sectionId],
                ['marks.subject_id', $this->subjectId]
            ]);
    }

    public function columns()
    {
        return [
            Column::name('subjects.name')
                ->label('Materia')
                ->hideable(),

            Column::name('users.name')
                ->label('Alumno')
                ->hideable(),

            Column::name('users.control_number')
                ->label('Número de control')
                ->hideable(),

            Column::name('first_mark')
                ->label('Calificación 1era Etapa')
                ->hideable(),

            Column::name('second_mark')
                ->label('Calificación 2da Etapa')
                ->hideable(),

            Column::name('third_mark')
                ->label('Calificación 3era Etapa')
                ->hideable(),

            Column::name('marks.final_mark')
                ->label('Calificación Final')
                ->editable(),

            DateColumn::name('updated_at')
                ->label('Actualización'),
        ];
    }

    public function buildActions()
    {

        return [
            Action::groupBy('Opciones a Exportar', function () {
                $sectionName = Section::find($this->sectionId)->name;
                $subjectName = Subject::find($this->subjectId)->name;
                return [
                    Action::value('csv')->label('Exportar CSV')->export("Calificaciones Finales " . $sectionName . "- Materia " . $subjectName . ".csv"),
                    Action::value('html')->label('Exportar HTML')->export("Calificaciones Finales " . $sectionName . "- Materia " . $subjectName . ".html"),
                    Action::value('pdf')->label('Exportar PDF')->export("Calificaciones Finales " . $sectionName . "- Materia " . $subjectName . ".pdf"),
                    Action::value('xlsx')->label('Exportar XLSX')->export("Calificaciones Finales " . $sectionName . "- Materia " . $subjectName . ".xlsx")
                ];
            }),
        ];
    }
}
