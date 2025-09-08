@extends('layouts.pdf-layout')

@section('content')
  <h4>Reporte Estadístico: Visitas del {{ $desde }} al {{ $hasta }}</h4>

    <table class="tabla">
        <thead class="encabezado">
            <tr>
                <th>Cant.</th>
                <th>Sitio</th>
            </tr>
        </thead>
        <tbody class="texto">
            <tr>
                <td>Total Genearal Personas</td>
                <td>{{ $total_personas }}</td>
            </tr>
            {{-- @foreach($visitas as $visita)
                <tr>
                    <td>{{ $visita->persona->apellidos }}, {{ $visita->persona->nombres }}</td>
                    <td>{{ $visita->created_at }}</td>
                    <td>{{ $visita->sitio->nombre }}</td>
                </tr>
            @endforeach --}}

            <tr>
                <td>Visitas</td>
                <td>{{ $total_visitas }}</td>
            </tr>
        </tbody>
    </table>
@endsection