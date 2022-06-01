<?php

namespace App\Http\Livewire\Tables\Admin\Payment;

use App\Models\Payment;
use Mediconesystems\LivewireDatatables\Action;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class CatalogueTable extends LivewireDatatable
{
    public $model = Payment::class;

    public function builder()
    {
        return Payment::query();
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->defaultSort('asc'),

            Column::name('title')
                ->label('Título del pago')
                ->hideable()
                ->editable()
                ->filterable(),

            NumberColumn::name('amount')
                ->label('Cantidad del pago')
                ->hideable()
                ->editable()
                ->filterable(),

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
                    'edit' => 'editPayment',
                    'delete' => 'callConfirmationPayment'
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
                    Action::value('csv')->label('Exportar CSV')->export('Catalogo_Pagos.csv'),
                    Action::value('html')->label('Exportar HTML')->export('Catalogo_Pagos.html'),
                    Action::value('pdf')->label('Exportar PDF')->export('Catalogo_Pagos.pdf'),
                    Action::value('xlsx')->label('Exportar XLSX')->export('Catalogo_Pagos.xlsx')
                ];
            }),
        ];
    }
}
