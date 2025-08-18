<?php

namespace Modules\AtencionCiudadano\Filament\Dashboard\Resources\Personas\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Modules\AtencionCiudadano\Filament\Dashboard\Resources\Personas\PersonaResource;

class ListPersonas extends ListRecords
{
    protected static string $resource = PersonaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
