<?php

namespace Modules\AtencionCiudadano\Filament\Dashboard\Resources\Personas\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\AtencionCiudadano\Filament\Dashboard\Resources\Personas\PersonaResource;

class CreatePersona extends CreateRecord
{
    protected static string $resource = PersonaResource::class;
}
