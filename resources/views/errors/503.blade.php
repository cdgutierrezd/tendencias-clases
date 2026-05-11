@extends('errors.layout')

@section('code', '503')

@section('content')
    <h1>503</h1>
    <h4>Servicio no disponible</h4>
    <p>El sistema está en mantenimiento. Vuelve a intentarlo en unos minutos.</p>
    <a href="{{ url('/home') }}" class="btn btn-primary">Volver al inicio</a>
@endsection
