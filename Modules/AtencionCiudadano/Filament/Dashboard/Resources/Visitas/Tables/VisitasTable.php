<?php

namespace Modules\AtencionCiudadano\Filament\Dashboard\Resources\Visitas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class VisitasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('persona_id')
                    ->label('Nombre de la persona')
                    ->formatStateUsing(fn ($state, $record) =>
                        $record->persona?->apellidos . ', '. $record->persona?->nombres
                    )
                    ->sortable(),
                
                TextColumn::make('created_at')
                    ->label('Fecha')
                    ->dateTime()
                    ->sortable(),
                
                TextColumn::make('sitio.nombre')
                    ->label('Sitio visitado')
                    ->sortable(),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
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
