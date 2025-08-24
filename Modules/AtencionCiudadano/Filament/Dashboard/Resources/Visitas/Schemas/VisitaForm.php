<?php

namespace Modules\AtencionCiudadano\Filament\Dashboard\Resources\Visitas\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class VisitaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('persona_id')
                    ->required()
                    ->numeric(),
                DateTimePicker::make('fecha')
                    ->required(),
                TextInput::make('sitio_id')
                    ->required()
                    ->numeric(),
                Textarea::make('observaciones')
                    ->columnSpanFull(),
            ]);
    }
}
