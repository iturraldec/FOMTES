<?php

namespace Modules\AtencionCiudadano\Filament\Dashboard\Resources\Visitas\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Modules\AtencionCiudadano\Filament\Dashboard\Resources\Visitas\VisitaResource;

class ListVisitas extends ListRecords
{
    protected static string $resource = VisitaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
