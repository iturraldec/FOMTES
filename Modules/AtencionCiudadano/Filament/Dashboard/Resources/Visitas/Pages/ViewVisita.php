<?php

namespace Modules\AtencionCiudadano\Filament\Dashboard\Resources\Visitas\Pages;

use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Modules\AtencionCiudadano\Filament\Dashboard\Resources\Visitas\VisitaResource;

class ViewVisita extends ViewRecord
{
    protected static string $resource = VisitaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
