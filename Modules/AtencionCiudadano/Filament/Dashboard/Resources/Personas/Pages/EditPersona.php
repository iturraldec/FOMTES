<?php

namespace Modules\AtencionCiudadano\Filament\Dashboard\Resources\Personas\Pages;

use Filament\Notifications\Notification;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;
use Modules\AtencionCiudadano\Filament\Dashboard\Resources\Personas\PersonaResource;

class EditPersona extends EditRecord
{
    protected static string $resource = PersonaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    } 

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('¡Registro modificado con éxito!')
            ->body('El registro ha sido modificado correctamente.');
    }    
}
