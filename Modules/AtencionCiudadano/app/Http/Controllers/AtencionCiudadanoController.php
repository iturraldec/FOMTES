<?php

namespace Modules\AtencionCiudadano\Http\Controllers;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Modules\AtencionCiudadano\Models\Visita;

class AtencionCiudadanoController extends Controller
{

    public function execute(string $reportType, string $desde, string $hasta)
    {   
        $data['desde'] = date("d/m/Y", strtotime($desde));
        $data['hasta'] = date("d/m/Y", strtotime($hasta));
            
        if($reportType == 'Listado') {
            $data['visitas'] = Visita::with('persona')
                                        ->with('sitio')
                                        ->whereBetween('created_at', [$desde, $hasta])
                                        ->orderBy('created_at', 'desc')
                                        ->get();
            
            $pdf = Pdf::loadView('atencionciudadano::visitas.listado', $data);
        }
        else {
            $sql = 'SELECT count(*) AS total FROM "AtencionCiudadano"."personas" WHERE deleted_at IS NULL;';
            $data['total_personas'] = DB::select($sql)[0]->total;

            $sql = 'SELECT COUNT(*), b.nombre 
                    FROM "AtencionCiudadano"."visitas" a 
                        INNER JOIN "AtencionCiudadano"."sitios" b ON a.sitio_id = b.id
                    WHERE DATE(a.created_at) BETWEEN ? AND ? 
                    GROUP BY b.nombre ';
            $data['total_sitios'] = DB::select($sql, [$desde, $hasta]);

            $sql = 'SELECT count(*) AS total FROM "AtencionCiudadano"."visitas" WHERE deleted_at IS NULL AND DATE(created_at) BETWEEN ? AND ?;';
            $data['total_visitas'] = DB::select($sql, [$desde, $hasta])[0]->total;

            $pdf = Pdf::loadView('atencionciudadano::visitas.estadisticas', $data);
        }

        return $pdf->download('visitas.pdf');
    } 
}
