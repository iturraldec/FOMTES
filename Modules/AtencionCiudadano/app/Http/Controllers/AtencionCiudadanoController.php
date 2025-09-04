<?php

namespace Modules\AtencionCiudadano\Http\Controllers;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Modules\AtencionCiudadano\Models\Visita;

class AtencionCiudadanoController extends Controller
{

    public function execute(string $reportType, string $desde, string $hasta)
    {
        $data['desde'] = date("d/m/Y", strtotime($desde));
        $data['hasta'] = date("d/m/Y", strtotime($hasta));
        $data['visitas'] = Visita::with('persona')
                                    ->with('sitio')
                                    ->whereBetween('created_at', [$desde, $hasta])
                                    ->orderBy('created_at', 'desc')
                                    ->get();
        
        $pdf = Pdf::loadView('atencionciudadano::visitas.visitas-pdf', $data);

        return $pdf->download('visita.pdf');
    } 
}
