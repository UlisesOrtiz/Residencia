<?php

namespace App\Http\Livewire\Tables\Admin\Administrative;

use App\Models\User;
use App\Constants\Constants;
use Mediconesystems\LivewireDatatables\Action;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class AdministrativeTable extends LivewireDatatable
{
    public $model = User::class;

    public function builder()
    {
        return User::query()
            ->where('role', "<>", Constants::ROLE['ESTUDIANTE']);
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->defaultSort('asc'),

            Column::name('name')
                ->label('Nombre')
                ->hideable()
                ->filterable(),


            Column::name('role')
                ->label('Tipo de Personal')
                ->hideable()
                ->filterable(Constants::ROLE_FILTER),

            Column::name('email')
                ->label('Correo Electrónico')
                ->hideable()
                ->filterable(),

            Column::name('gender')
                ->label('Género')
                ->hideable()
                ->filterable(Constants::GENDER),

            DateColumn::name('birthday')
                ->label('Fecha de Nacimiento')
                ->filterable(),

            Column::name('address')
                ->label('Dirección')
                ->hideable()
                ->filterable(),

            Column::name('phone')
                ->label('Teléfono Celular')
                ->hideable()
                ->filterable(),

            Column::name('telephone')
                ->label('Teléfono Fijo')
                ->hideable()
                ->filterable(),

            Column::name('blood_group')
                ->label('Tipo de Sangre')
                ->hideable()
                ->filterable(Constants::BLOOD_GROUP),

            Column::name('health_issues')
                ->label('Alguna Enfermedad')
                ->hideable()
                ->filterable(),

            DateColumn::name('created_at')
                ->label('Creada')
                ->filterable(),

            DateColumn::name('updated_at')
                ->label('Actualización')
                ->filterable(),

            Column::callback(['id'], function ($id) {
                if ($id != 1) {
                    return view('table-actions.actions', [
                        'id' => $id,
                        'edit' => 'editAdministrative',
                        'delete' => 'callConfirmationAdministrative',
                    ]);
                }
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
                    Action::value('csv')->label('Exportar CSV')->export('Personal_Administrativo.csv'),
                    Action::value('html')->label('Exportar HTML')->export('Personal_Administrativo.html'),
                    Action::value('xlsx')->label('Exportar XLSX')->export('Personal_Administrativo.xlsx')
                ];
            }),
        ];
    }
}
