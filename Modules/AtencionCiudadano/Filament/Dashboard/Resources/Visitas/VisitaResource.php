<?php

namespace Modules\AtencionCiudadano\Filament\Dashboard\Resources\Visitas;

use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Modules\AtencionCiudadano\Filament\Dashboard\Resources\Visitas\Pages\CreateVisita;
use Modules\AtencionCiudadano\Filament\Dashboard\Resources\Visitas\Pages\EditVisita;
use Modules\AtencionCiudadano\Filament\Dashboard\Resources\Visitas\Pages\ListVisitas;
use Modules\AtencionCiudadano\Filament\Dashboard\Resources\Visitas\Pages\ViewVisita;
use Modules\AtencionCiudadano\Filament\Dashboard\Resources\Visitas\Schemas\VisitaForm;
use Modules\AtencionCiudadano\Filament\Dashboard\Resources\Visitas\Schemas\VisitaInfolist;
use Modules\AtencionCiudadano\Filament\Dashboard\Resources\Visitas\Tables\VisitasTable;
use Modules\AtencionCiudadano\Models\Visita;

class VisitaResource extends Resource
{
    protected static ?string $model = Visita::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return VisitaForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return VisitaInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return VisitasTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListVisitas::route('/'),
            'create' => CreateVisita::route('/create'),
            'view' => ViewVisita::route('/{record}'),
            'edit' => EditVisita::route('/{record}/edit'),
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
