<?php

namespace Modules\AtencionCiudadano\Filament\Dashboard\Resources\Visitas\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class VisitaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nombre_persona')
                    ->label('Nombre de la persona')
                    ->afterStateHydrated(function (TextInput $component, $record) {
                        $component->state($record?->persona?->apellidos .', ' . $record?->persona?->nombres);
                    })
                    ->readOnly(),

                DateTimePicker::make('created_at')
                    ->label('Fecha')
                    ->required()
                    ->default(now()),

                Select::make('sitio_id')
                    ->label('Sitio de la visita')
                    ->relationship(name: 'sitio', titleAttribute: 'nombre')
                    ->required(),

                Textarea::make('observaciones')
                    ->columnSpanFull(),
            ]);
    }
}
