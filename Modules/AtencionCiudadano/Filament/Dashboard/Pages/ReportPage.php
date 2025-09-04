<?php

namespace Modules\AtencionCiudadano\Filament\Dashboard\Pages;

use Filament\Pages\Page;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Redirect;

//
class ReportPage extends Page implements HasForms
{
    use InteractsWithForms;

    public array $data = [];

    protected static ?int $navigationSort = 4;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-s-document';

    protected static ?string $navigationLabel = 'Reportes';
    
    public static ?string $title = 'Generar Reportes/Estadísticas';

    protected string $view = 'atencionciudadano::filament.dashboard.pages.report-page';

    protected function getHeaderActions(): array
    {
        return [
            Action::make('imprimir')
                ->icon('heroicon-s-printer')
                ->action('imprimirReporte'),
        ];
    }

    public function form(Schema $form): Schema
    {
        return $form
            ->schema([
                Select::make('reportType')
                    ->label('Tipo de Reporte')
                    ->options([
                        'Listado' => 'Listado',
                        'Estadisticas' => 'Estadísticas',
                    ])
                    ->required()
                    ->live(),

                DatePicker::make('desde')
                    ->label('Desde')
                    ->required(),

                DatePicker::make('hasta')
                    ->label('Hasta')
                    ->required(),
            ])
            ->statePath('data');
    }

    //
    public function imprimirReporte()
    {
        $data = $this->form->validate();

        $params = [
            'reportType' => $this->data['reportType'],
            'desde' => $this->data['desde'],
            'hasta' => $this->data['hasta'],
        ];
        
        return Redirect::route('visitas.print', $params);
    }

}
