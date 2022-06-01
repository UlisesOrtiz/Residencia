<?php

namespace App\Http\Livewire\Tables\Admin\Academic;

use App\Models\MyClass;
use Mediconesystems\LivewireDatatables\Action;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;

use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class MyClassTable extends LivewireDatatable
{
    public $model = Career::class;
    public $hideable = "select";

    public function builder()
    {
        return MyClass::query();
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->defaultSort('asc')
                ->hideable(),

            Column::name('name')
                ->label('Especialidad')
                ->hideable()
                ->filterable(),

            BooleanColumn::name('status')
                ->label('Estatus')
                ->exportCallback(function ($status) {
                    return $status == 1 ? 'Activo' : 'Inactivo';
                })
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
                    'edit' => 'editMyClass',
                    'delete' => 'callConfirmationMyClass'
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
                    Action::value('csv')->label('Exportar CSV')->export('Especialidades.csv'),
                    Action::value('html')->label('Exportar HTML')->export('Especialidades.html'),
                    Action::value('pdf')->label('Exportar PDF')->export('Especialidades.pdf'),
                    Action::value('xlsx')->label('Exportar XLSX')->export('Especialidades.xlsx')
                ];
            }),
        ];
    }
}
