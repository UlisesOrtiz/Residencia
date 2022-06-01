<?php

namespace App\Http\Livewire\Tables\Admin\Incident;

use App\Models\Incident;
use Mediconesystems\LivewireDatatables\Action;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class IncidentCatalogueTable extends LivewireDatatable
{
    public $model = Incident::class;

    public function builder()
    {
        return Incident::query();
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->defaultSort('asc'),

            Column::name('title')
                ->label('Título del incidente')
                ->hideable()
                ->editable()
                ->filterable(),

            Column::name('description')
                ->label('Descripción')
                ->hideable()
                ->editable()
                ->unsortable(),

            Column::name('type')
                ->label('Tipo de Incidente')
                ->hideable()
                ->editable()
                ->filterable([
                    'Falta' => 'Falta',
                    'Apoyo' => 'Apoyo'
                ]),

            Column::name('incident_level')
                ->label('Nivel de Incidente')
                ->hideable()
                ->editable()
                ->filterable([
                    'Leve' => 'Leve',
                    'Regular' => 'Regular',
                    'Muy grave' => 'Muy grave'
                ]),

            Column::name('penalty')
                ->label('Castigo/Recomendación')
                ->hideable()
                ->editable()
                ->unsortable(),

            BooleanColumn::name('status')
                ->label('Estatus')
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
                    'edit' => 'editIncident',
                    'delete' => 'callConfirmationIncident'
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
                    Action::value('csv')->label('Exportar CSV')->export('Catalogo_Incidentes.csv'),
                    Action::value('html')->label('Exportar HTML')->export('Catalogo_Incidentes.html'),
                    Action::value('pdf')->label('Exportar PDF')->export('Catalogo_Incidentes.pdf'),
                    Action::value('xlsx')->label('Exportar XLSX')->export('Catalogo_Incidentes.xlsx')
                ];
            }),
        ];
    }
}
