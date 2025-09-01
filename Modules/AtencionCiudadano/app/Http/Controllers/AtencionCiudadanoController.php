<?php

namespace Modules\AtencionCiudadano\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use stdClass;
use Barryvdh\DomPDF\Facade\Pdf;

class AtencionCiudadanoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('atencionciudadano::index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('atencionciudadano::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('atencionciudadano::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('atencionciudadano::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {}

    // descargar listado de visitas a pdf
    public function print(Oficio $oficio)
    {
        $datos = new stdClass;
        $datos->numero = "DTI-2025-".str_pad($oficio->id,6, '0', STR_PAD_LEFT);
        $datos->fecha = "Mérida, " . date('d/m/Y', strtotime($oficio->created_at));
        $datos->destino = $oficio->destino->nombre;
        $datos->recibe = $oficio->destino->responsable;
        $datos->motivo = $oficio->motivo;
        $datos->envia = $oficio->envia;

        $data = [
            'oficio' => $datos,
        ];

        $pdf = Pdf::loadView('oficios.oficio-pdf', $data);

        return $pdf->download('oficio.pdf');
    }
}
