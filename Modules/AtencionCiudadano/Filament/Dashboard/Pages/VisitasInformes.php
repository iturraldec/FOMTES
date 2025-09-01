<?php

namespace Modules\AtencionCiudadano\Filament\Dashboard\Pages;

use BackedEnum;
use Filament\Pages\Page;

class VisitasInformes extends Page
{
    protected static ?int $navigationSort = 4;
    protected static ?string $navigationLabel = 'Informes';
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-document-text';
    protected string $view = 'atencionciudadano::filament.dashboard.pages.visitas-informes';
}
