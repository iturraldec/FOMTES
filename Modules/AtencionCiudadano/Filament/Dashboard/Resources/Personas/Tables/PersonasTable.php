<?php

namespace Modules\AtencionCiudadano\Filament\Dashboard\Resources\Personas\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Modules\AtencionCiudadano\Models\Visita;
use Modules\AtencionCiudadano\Filament\Dashboard\Resources\Personas\Schemas\VisitaModalForm;

//
class PersonasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('nombres')
            ->columns([
                TextColumn::make('documento_id')
                    ->label('C.I.')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('nombres')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('apellidos')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('email')
                    ->searchable(),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make()->successNotificationTitle('Persona actualizada!'),
                Action::make('visita')
                    ->label('Visita')
                    ->icon('heroicon-o-eye')
                    ->modalHeading('Registrar Visita')
                    ->form(VisitaModalForm::schema())
                    ->action(function (array $data, $record) {
                        Visita::create([
                            'persona_id'    => $record->id,
                            'sitio_id'      => $data['sitio_id'],
                            'observaciones' => $data['observaciones'] ?? null,
                        ]);
                    })
                    ->successNotificationTitle('¡Visita registrada!'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                DeleteBulkAction::make(),
                ForceDeleteBulkAction::make(),
                RestoreBulkAction::make(),
                ]),
            ]);
    }
}
