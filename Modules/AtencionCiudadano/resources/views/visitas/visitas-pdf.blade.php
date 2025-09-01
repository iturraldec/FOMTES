@extends('oficios.layouts.layout-pdf')

@section('content')
  <section class="numero">{{ $oficio->numero }}</section>
  <section class="fecha">{{ $oficio->fecha }}</section>
  <section class="recibe">
    {{ $oficio->destino }}<br>
    {{ $oficio->recibe }}<br>
  </section>
  <section class="motivo">{!! str($oficio->motivo)->sanitizeHtml() !!}</section>
@endsection