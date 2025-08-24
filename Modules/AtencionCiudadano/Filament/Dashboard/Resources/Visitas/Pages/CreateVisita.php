<?php

namespace Modules\AtencionCiudadano\Filament\Dashboard\Resources\Visitas\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\AtencionCiudadano\Filament\Dashboard\Resources\Visitas\VisitaResource;

class CreateVisita extends CreateRecord
{
    protected static string $resource = VisitaResource::class;
}
