<?php

namespace Modules\AtencionCiudadano\Filament\Dashboard\Resources\Sitios;

use Modules\AtencionCiudadano\Filament\Dashboard\Resources\Sitios\Pages\ManageSitios;
use Modules\AtencionCiudadano\Models\Sitio;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;

class SitioResource extends Resource
{
    protected static ?string $model = Sitio::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::BuildingOffice;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nombre')
                    ->label('Nombre del sitio a visitar')
                    ->required()
                    ->unique()
                    ->maxLength(255),
                Select::make('activo')
                    ->options([
                        '1' => 'Sí',
                        '0' => 'No'
                    ])
                    ->label('¿Está activo?')
                    ->default('1')
                    ->native(false)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nombre')
                    ->searchable(),
                TextColumn::make('activo'),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                EditAction::make()
                    ->successNotificationTitle('Sitio de visita actualizado!')
                    ->label('Editar'),
                DeleteAction::make()
                    ->successNotificationTitle('Sitio de visita eliminado!')
                    ->label('Eliminar'),
                ForceDeleteAction::make(),
                RestoreAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageSitios::route('/'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
