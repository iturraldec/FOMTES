<?php

namespace Modules\AtencionCiudadano\Filament\Dashboard\Resources\Sitios\Pages;

use Modules\AtencionCiudadano\Filament\Dashboard\Resources\Sitios\SitioResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageSitios extends ManageRecords
{
    protected static string $resource = SitioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Crear Sitio de visita')
                ->successNotificationTitle('Sitio de visita creado!'),
        ];
    }
}
