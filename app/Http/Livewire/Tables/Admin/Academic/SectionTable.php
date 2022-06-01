<?php

namespace App\Http\Livewire\Tables\Admin\Academic;

use App\Models\Section;
use App\Models\MyClass;
use App\Constants\Constants;
use Mediconesystems\LivewireDatatables\Action;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class SectionTable extends LivewireDatatable
{
    public $model = Career::class;
    public $hideable = "select";
    
    public function builder()
    {
        return Section::query()->join('my_classes', 'my_classes.id', 'sections.my_class_id');
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->defaultSort('asc'),

            Column::name('name')
                ->label('Grupo')
                ->hideable()
                ->filterable(),

            BooleanColumn::name('status')
                ->label('Estatus')
                ->exportCallback(function ($status) {
                    return $status == 1 ? 'Activo' : 'Inactivo';
                })
                ->hideable(),

            Column::name('my_classes.name')
                ->label('Especialidad')
                ->hideable()
                ->filterable(MyClass::pluck('name')),

            NumberColumn::name('semester')
                ->label('Semestre')
                ->filterable()
                ->hideable(),

            Column::name('time')
                ->label('Turno')
                ->hideable()
                ->filterable(Constants::TIME),

            DateColumn::name('created_at')
                ->label('Creada')
                ->filterable(),

            DateColumn::name('updated_at')
                ->label('Actualización')
                ->filterable(),

            Column::callback(['id'], function ($id) {
                return view('table-actions.actions', [
                    'id' => $id,
                    'edit' => 'editSection',
                    'delete' => 'callConfirmationSection'
                ]);
            })
                ->label('Acciones')
                ->unsortable()
                ->hideable()
                ->excludeFromExport(),
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
