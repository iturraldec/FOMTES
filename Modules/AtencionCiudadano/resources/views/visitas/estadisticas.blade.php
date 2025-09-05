@extends('layouts.pdf-layout')

@section('content')
  <h4>Reporte Estadísticos de las Visitas del {{ $desde }} al {{ $hasta }}</h4>

    <table class="tabla">
        <thead class="encabezado">
            <tr>
                <th>Cant.</th>
                <th>Sitio</th>
            </tr>
        </thead>
        <tbody class="texto">
            {{-- @foreach($visitas as $visita)
                <tr>
                    <td>{{ $visita->persona->apellidos }}, {{ $visita->persona->nombres }}</td>
                    <td>{{ $visita->created_at }}</td>
                    <td>{{ $visita->sitio->nombre }}</td>
                </tr>
            @endforeach --}}
        </tbody>
    </table>
@endsection