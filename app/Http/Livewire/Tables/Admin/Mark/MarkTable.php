<?php

namespace App\Http\Livewire\Tables\Admin\Mark;

use App\Models\Mark;
use App\Models\Section;
use App\Models\Subject;
use Mediconesystems\LivewireDatatables\Action;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class MarkTable extends LivewireDatatable
{
    public $model = Mark::class;
    public $sectionId = '', $subjectId = '';
    public $hideable = "select";

    public function builder()
    {
        return Mark::query()
            ->join('subjects', 'subjects.id', 'marks.subject_id')
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

            Column::name('first_attendance')
                ->label('Asistencias 1° bimestre')
                ->editable()
                ->hideable(),

            Column::name('first_mark')
                ->label('Calificación 1° bimestre')
                ->editable()
                ->hideable(),
            // Column::callback(['id'], function ($id) {
            //     return view('table-actions.mark-actions', [
            //         'id' => $id,
            //         'value' => 0,
            //     ]);
            // })
            //     ->exportCallback(['fist_mark'], function ($first_mark) {
            //         return $first_mark;
            //     })
            //     ->unsortable()
            //     ->label('Calificación 1° bimestre'),

            Column::name('second_attendance')
                ->label('Asistencias 2° bimestre')
                ->editable()
                ->hideable(),

            Column::name('second_mark')
                ->label('Calificación 2° bimestre')
                ->editable()
                ->hideable(),

            Column::name('third_attendance')
                ->label('Asistencias 3° bimestre')
                ->editable()
                ->hideable(),

            Column::name('third_mark')
                ->label('Calificación 3° bimestre')
                ->editable()
                ->hideable(),

            DateColumn::name('updated_at')
                ->label('Actualización'),
        ];
    }
    public function updateMark(int $id)
    {
        $this->emit('hello',  $id);
    }
    public function buildActions()
    {
        return [

            Action::groupBy('Opciones a Exportar', function () {
                $sectionName = Section::find($this->sectionId)->name;
                $subjectName = Subject::find($this->subjectId)->name;
                return [
                    Action::value('csv')->label('Exportar CSV')->export("Calificaciones  " . $sectionName . "- Materia " . $subjectName . ".csv"),
                    Action::value('html')->label('Exportar HTML')->export("Calificaciones  " . $sectionName . "- Materia " . $subjectName . ".html"),
                    Action::value('pdf')->label('Exportar PDF')->export("Calificaciones  " . $sectionName . "- Materia " . $subjectName . ".pdf"),
                    Action::value('xlsx')->label('Exportar XLSX')->export("Calificaciones  " . $sectionName . "- Materia " . $subjectName . ".xlsx")
                ];
            }),
        ];
    }
}
