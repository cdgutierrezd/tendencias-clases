@extends('errors.layout')

@section('code', '429')

@section('content')
    <h1>429</h1>
    <h4>Demasiadas solicitudes</h4>
    <p>Has realizado demasiadas solicitudes en poco tiempo. Espera un momento e intenta de nuevo.</p>
    <a href="{{ url('/home') }}" class="btn btn-primary">Volver al inicio</a>
@endsection
