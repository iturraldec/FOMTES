<?php

namespace Modules\AtencionCiudadano\Filament\Dashboard\Resources\Visitas\Pages;

use Filament\Resources\Pages\ListRecords;
use Modules\AtencionCiudadano\Filament\Dashboard\Resources\Visitas\VisitaResource;
use Filament\Actions\Action;

class ListVisitas extends ListRecords
{
    protected static string $resource = VisitaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            /* Action::make('imprimir')
                ->label('Imprimir visitas')
                ->icon('heroicon-o-printer')
                ->modalHeading('Imprimir visitas'), */
        ];
    }
}
