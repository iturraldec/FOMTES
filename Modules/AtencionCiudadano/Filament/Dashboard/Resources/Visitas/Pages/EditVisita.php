<?php

namespace Modules\AtencionCiudadano\Filament\Dashboard\Resources\Visitas\Pages;

use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;
use Modules\AtencionCiudadano\Filament\Dashboard\Resources\Visitas\VisitaResource;

class EditVisita extends EditRecord
{
    protected static string $resource = VisitaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
