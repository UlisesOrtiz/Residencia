<?php

namespace App\Http\Livewire\Tables\Admin\Academic;

use App\Models\Subject;
use App\Models\MyClass;
use App\Models\Section;
use App\Constants\Constants;
use Mediconesystems\LivewireDatatables\Action;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class SubjectTable extends LivewireDatatable
{
    public $model = Subject::class;
    public $hideable = "select";
    
    public function builder()
    {
        return Subject::query()
            ->join('my_classes', 'my_classes.id', 'subjects.my_class_id')
            ->join('users', 'users.id', 'subjects.teacher_id')
            ->join('sections', 'sections.id', 'subjects.section_id');
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->defaultSort('asc'),

            Column::name('name')
                ->label('Nombre materia')
                ->hideable()
                ->editable()
                ->filterable(),

            Column::name('slug')
                ->label('Abreviatura')
                ->hideable()
                ->editable()
                ->filterable(),

            Column::name('time')
                ->label('Turno')
                ->hideable()
                ->filterable(Constants::TIME),

            BooleanColumn::name('status')
                ->label('Estatus')
                ->hideable(),

            Column::name('my_classes.name')
                ->label('Especialidad')
                ->hideable()
                ->filterable(MyClass::pluck('name')),

            Column::name('sections.name')
                ->label('Grupo')
                ->hideable()
                ->filterable(Section::pluck('name')),

            Column::name('users.name')
                ->label('Docente a cargo')
                ->hideable()
                ->filterable(),

            NumberColumn::name('semester')
                ->label('Semestre')
                ->filterable()
                ->editable()
                ->hideable(),

            DateColumn::name('created_at')
                ->label('Creada')
                ->filterable(),

            DateColumn::name('updated_at')
                ->label('Actualización')
                ->filterable(),

            Column::callback(['id'], function ($id) {
                return view('table-actions.actions', [
                    'id' => $id,
                    'edit' => 'editSubject',
                    'delete' => 'callConfirmationSubject'
                ]);
            })->exportCallback(function () {
                return 'Acciones';
            })->unsortable()->label('Acciones'),
        ];
    }

    public function buildActions()
    {
        return [
            Action::groupBy('Opciones a Exportar', function () {
                return [
                    Action::value('csv')->label('Exportar CSV')->export('Materias.csv'),
                    Action::value('html')->label('Exportar HTML')->export('Materias.html'),
                    Action::value('pdf')->label('Exportar PDF')->export('Materias.pdf'),
                    Action::value('xlsx')->label('Exportar XLSX')->export('Materias.xlsx')
                ];
            }),
        ];
    }
}
