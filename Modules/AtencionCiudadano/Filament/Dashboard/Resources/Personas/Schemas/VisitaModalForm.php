<?php

namespace Modules\AtencionCiudadano\Filament\Dashboard\Resources\Personas\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Modules\AtencionCiudadano\Models\Sitio;

class VisitaModalForm
{
  public static function schema(): array
  {
    return [
      Select::make('sitio_id')
        ->label('Sitio a visitar')
        ->options(fn () => Sitio::where('activo', true)->OrderBy('nombre')->pluck('nombre', 'id'))
        ->required(),
      
      
      Textarea::make('observaciones')
        ->label('Observaciones')
        ->rows(3),
    ];
  }
}