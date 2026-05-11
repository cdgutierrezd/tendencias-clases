@extends('errors.layout')

@section('code', '401')

@section('content')
    <h1>401</h1>
    <h4>No autenticado</h4>
    <p>Debes iniciar sesión para acceder a esta página.</p>
    <a href="{{ route('login') }}" class="btn btn-primary">Iniciar sesión</a>
@endsection
