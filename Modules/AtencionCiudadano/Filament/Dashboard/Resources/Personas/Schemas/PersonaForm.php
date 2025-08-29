<?php

namespace Modules\AtencionCiudadano\Filament\Dashboard\Resources\Personas\Schemas;

use App\Models\Municipio;
use App\Models\Parroquia;
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
            ->maxLength(20)
            ->unique(),

            TextInput::make('nombres')
            ->label('Nombre(s) de la persona')
            ->required()
            ->maxLength(100),

            TextInput::make('apellidos')
            ->label('Apellido(s) de la persona')
            ->required()
            ->maxLength(100),

            TextInput::make('email')
            ->label('Correo electrónico')
            ->maxLength(100)
            ->unique(),

          Select::make('id_municipio')
            ->label('Municipio')
            ->options(Municipio::Where('id_estado', 13)->pluck('municipio', 'id_municipio'))
            ->required()
            ->preload()
            ->live()
            ->afterStateHydrated(function ($component, $state, $record) {
                if ($record && $record->parroquia) {
                    $component->state($record->parroquia->id_municipio);
                }
            }),

          Select::make('parroquia_id')
            ->label('Parroquia')
            ->relationship(
                name: 'parroquia',
                titleAttribute: 'parroquia',
                modifyQueryUsing: fn (Builder $query, callable $get) =>
                    $query->when(
                        $get('id_municipio'),
                        fn ($q, $municipioId) => $q->where('id_municipio', $municipioId)
                    )
            )
            ->live()
            ->required()
            ->placeholder('Seleccione un municipio primero'),

          Textarea::make('direccion')
            ->required(),

          Textarea::make('observaciones'),
        ]);
  }
}
