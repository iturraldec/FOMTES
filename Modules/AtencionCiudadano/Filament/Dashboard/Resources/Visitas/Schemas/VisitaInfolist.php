<?php

namespace Modules\AtencionCiudadano\Filament\Dashboard\Resources\Visitas\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class VisitaInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('persona_id')
                    ->numeric(),
                TextEntry::make('fecha')
                    ->dateTime(),
                TextEntry::make('sitio_id')
                    ->numeric(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
                TextEntry::make('deleted_at')
                    ->dateTime(),
            ]);
    }
}
