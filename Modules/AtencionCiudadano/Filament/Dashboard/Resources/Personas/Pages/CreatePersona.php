<?php

namespace Modules\AtencionCiudadano\Filament\Dashboard\Resources\Personas\Pages;

use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;
use Modules\AtencionCiudadano\Filament\Dashboard\Resources\Personas\PersonaResource;

class CreatePersona extends CreateRecord
{
    protected static string $resource = PersonaResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('¡Registro creado con éxito!')
            ->body('El nuevo registro ha sido guardado correctamente.');
    }
}
