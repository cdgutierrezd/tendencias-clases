@extends('layouts.app')

@section('content')
<style>
    body { background: #f7f7f7; font-family: 'Segoe UI', sans-serif; }
    .container { max-width: 480px; margin: 6vh auto; padding: 0 1rem; }
    .card { background: #fff; border: 1px solid #e5e5e5; border-radius: 8px; box-shadow: 0 2px 12px rgba(0,0,0,.06); padding: 2.5rem 2rem; text-align: center; }
    .welcome-icon { font-size: 2.2rem; margin-bottom: 1rem; }
    .welcome-title { font-size: 1.1rem; font-weight: 700; color: #222; margin-bottom: .4rem; }
    .welcome-sub { font-size: .85rem; color: #888; }
    .alert-success { background: #f0faf4; border: 1px solid #b7e4c7; color: #276749; border-radius: 5px; padding: .7rem 1rem; margin-bottom: 1.2rem; font-size: .85rem; }
</style>
<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">{{ session('status') }}</div>
    @endif
    <div class="card">
        <div class="welcome-icon">👋</div>
        <div class="welcome-title">Bienvenido, {{ Auth::user()->name }}</div>
        <div class="welcome-sub">Has iniciado sesión correctamente.</div>
    </div>
</div>
@endsection
