<?php

namespace Modules\AtencionCiudadano\Filament\Dashboard\Resources\Personas;

use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Modules\AtencionCiudadano\Filament\Dashboard\Resources\Personas\Pages\CreatePersona;
use Modules\AtencionCiudadano\Filament\Dashboard\Resources\Personas\Pages\EditPersona;
use Modules\AtencionCiudadano\Filament\Dashboard\Resources\Personas\Pages\ListPersonas;
use Modules\AtencionCiudadano\Filament\Dashboard\Resources\Personas\Pages\ViewPersona;
use Modules\AtencionCiudadano\Filament\Dashboard\Resources\Personas\Schemas\PersonaForm;
use Modules\AtencionCiudadano\Filament\Dashboard\Resources\Personas\Schemas\PersonaInfolist;
use Modules\AtencionCiudadano\Filament\Dashboard\Resources\Personas\Tables\PersonasTable;
use Modules\AtencionCiudadano\Models\Persona;

class PersonaResource extends Resource
{
    protected static ?string $model = Persona::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return PersonaForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PersonaInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PersonasTable::configure($table);
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
            'index' => ListPersonas::route('/'),
            'create' => CreatePersona::route('/create'),
            'view' => ViewPersona::route('/{record}'),
            'edit' => EditPersona::route('/{record}/edit'),
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
