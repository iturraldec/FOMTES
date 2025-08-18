<?php

namespace Modules\AtencionCiudadano\Filament\Dashboard\Resources\Personas\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Builder;

class PersonaForm
{
  public static function configure(Schema $schema): Schema
  {
    return $schema
        ->components([
          TextInput::make('documento_id')
                    ->label('Cédula de Identidad')
                    ->required()
                    ->maxLength(20),
          TextInput::make('nombres')
                    ->label('Nombre(s) de la persona')
                    ->required()
                    ->maxLength(100),
          TextInput::make('nombres')
                    ->label('Apellido(s) de la persona')
                    ->required()
                    ->maxLength(100),
          TextInput::make('email')
                    ->label('Correo electrónico')
                    ->maxLength(100),
          Select::make('municipio_id')
                    ->relationship(name: 'municipio',
                        titleAttribute: 'municipio',
                        modifyQueryUsing: fn (Builder $query) => $query->where('id_estado', 13))
                    ->preload(),
          TextInput::make('parroquia_id'),
          Textarea::make('direccion')
                    ->required(),
          Textarea::make('observaciones'),
        ]);
  }
}
