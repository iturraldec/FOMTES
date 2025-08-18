<?php

namespace Modules\AtencionCiudadano\Filament\AtencionCiudadano\Resources\Sitios\Pages;

use Modules\AtencionCiudadano\Filament\AtencionCiudadano\Resources\Sitios\SitioResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageSitios extends ManageRecords
{
    protected static string $resource = SitioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->successNotificationTitle('Sitio de visita creado!'),
        ];
    }
}
