<?php

namespace Modules\AtencionCiudadano\Filament\Dashboard\Pages;

use Filament\Pages\Page;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ReportPage extends Page implements HasForms
{
    use InteractsWithForms;

    public ?string $reportType = null;

    public ?string $fechaDesde = null;

    public ?string $fechaHasta = null;

    protected static ?int $navigationSort = 4;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-s-document';

    protected static ?string $navigationLabel = 'Reportes';
    
    public static ?string $title = 'Generar Reportes/Estadísticas';

    protected string $view = 'atencionciudadano::filament.dashboard.pages.report-page';

    protected function getHeaderActions(): array
    {
        return [
            Action::make('Imprimir'),
        ];
    }

    public function form(Schema $form): Schema
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Select::make('reportType')
                            ->label('Tipo de Reporte')
                            ->options([
                                'Listado' => 'Listado',
                                'Estadisticas' => 'Estadísticas',
                            ])
                            ->reactive(),
        
                        DatePicker::make('desde')
                            ->label('Desde')
                            ->visible(fn ($get) => $get('reportType') === 'Listado'),
        
                        DatePicker::make('hasta')
                            ->label('Hasta')
                            ->visible(fn ($get) => $get('reportType') === 'Listado'),
                    ])
                ->compact()
            ]);
    }

/*     public function getFormSchema(): array
    {
        return [
            Select::make('reportType')
                ->label('Tipo de Reporte')
                ->options([
                    'Listado' => 'Listado',
                    'Estadisticas' => 'Estadísticas',
                ])
                ->reactive(),

            DatePicker::make('desde')
                ->label('Reporte desde')
                ->visible(fn ($get) => $get('reportType') === 'Listado'),

            DatePicker::make('hasta')
                ->label('Reporte hasta')
                ->visible(fn ($get) => $get('reportType') === 'Listado'),
        ];
    }
     */
    /* protected function getFormModel(): string | null
    {
        return null;
    }
 */
    /* public function mount(): void
    {
        $this->form->fill();
    } */
}
