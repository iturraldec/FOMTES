@extends('layouts.pdf-layout')

@section('content')
  <h1>Reporte de Visitas</h1>

    <table>
        <thead>
            <tr>
                <th>Nombre y Apellidos</th>
                <th>Fecha de la Visita</th>
                <th>Sitio</th>
            </tr>
        </thead>
        <tbody>
            @foreach($visitas as $visita)
                <tr>
                    <td>{{ $visita->persona->nombre }} {{ $visita->persona->apellidos }}</td>
                    <td>{{ $visita->created_at }}</td>
                    <td>{{ $visita->sitio->nombre }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection