@extends('layouts.pdf-layout')

@section('content')
  <h4>Reporte Estadístico: Visitas del {{ $desde }} al {{ $hasta }}</h4>

    <table class="tabla">
        <thead class="encabezado">
            <tr>
                <th>Descripción</th>
                <th>Cant.</th>
            </tr>
        </thead>
        <tbody class="texto">
            <tr>
                <td>Personas inscritas-total general</td>
                <td>{{ $total_personas }}</td>
            </tr>
            @foreach($total_sitios as $sitio)
                <tr>
                    <td>{{ $sitio->nombre }}</td>
                    <td>{{ $sitio->count }}</td>
                </tr>
            @endforeach

            <tr>
                <td>Total visitas en el lapso</td>
                <td>{{ $total_visitas }}</td>
            </tr>
        </tbody>
    </table>
@endsection