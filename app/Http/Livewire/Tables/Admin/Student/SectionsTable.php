<?php

namespace App\Http\Livewire\Tables\Admin\Student;

use App\Models\StudentRecord;
use Mediconesystems\LivewireDatatables\Action;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class SectionsTable extends LivewireDatatable
{
    public $model = StudentRecord::class;
    public $sectionId = '';

    public function builder()
    {
        return StudentRecord::query()
            ->join('my_classes', 'my_classes.id', 'student_records.my_class_id')
            ->join('sections', 'sections.id', 'student_records.section_id')
            ->join('users', 'users.id', 'student_records.user_id')
            ->where('student_records.section_id', $this->sectionId);
    }

    public function columns()
    {
        return [

            Column::name('my_classes.name')
                ->label('Especialidad')
                ->hideable(),

            Column::name('sections.name')
                ->label('Grupo')
                ->hideable(),

            Column::name('users.name')
                ->label('Alumno')
                ->hideable(),

            Column::name('users.control_number')
                ->label('Número de Control')
                ->hideable(),

            DateColumn::name('updated_at')
                ->label('Actualización'),
        ];
    }

    public function buildActions()
    {
        return [
            Action::groupBy('Opciones a Exportar', function () {
                return [
                    Action::value('csv')->label('Exportar CSV')->export('Grupos.csv'),
                    Action::value('html')->label('Exportar HTML')->export('Grupos.html'),
                    Action::value('pdf')->label('Exportar PDF')->export('Grupos.pdf'),
                    Action::value('xlsx')->label('Exportar XLSX')->export('Grupos.xlsx')
                ];
            }),
        ];
    }
}
