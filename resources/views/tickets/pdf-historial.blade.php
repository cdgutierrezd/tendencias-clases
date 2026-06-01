<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Historial Ticket #{{ $ticket->id }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            width: 100%;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 3px solid #007bff;
            padding-bottom: 15px;
        }
        .header h1 {
            color: #007bff;
            font-size: 28px;
            margin-bottom: 5px;
        }
        .header p {
            color: #666;
            font-size: 12px;
        }
        .section {
            margin-bottom: 25px;
        }
        .section-title {
            background-color: #f8f9fa;
            border-left: 4px solid #007bff;
            padding: 10px 15px;
            font-size: 16px;
            font-weight: bold;
            color: #007bff;
            margin-bottom: 15px;
        }
        .info-row {
            display: flex;
            margin-bottom: 10px;
            padding: 8px 0;
            border-bottom: 1px solid #eee;
        }
        .info-label {
            width: 30%;
            font-weight: bold;
            color: #555;
        }
        .info-value {
            width: 70%;
            color: #333;
            word-break: break-word;
        }
        .badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: bold;
        }
        .badge-success {
            background-color: #28a745;
            color: white;
        }
        .badge-danger {
            background-color: #dc3545;
            color: white;
        }
        .comentario {
            background-color: #f8f9fa;
            border-left: 3px solid #007bff;
            padding: 12px;
            margin-bottom: 12px;
            border-radius: 4px;
        }
        .comentario-header {
            font-weight: bold;
            color: #007bff;
            margin-bottom: 5px;
            font-size: 12px;
        }
        .comentario-fecha {
            color: #999;
            font-size: 11px;
            display: inline-block;
            float: right;
        }
        .comentario-texto {
            color: #333;
            margin-top: 8px;
            line-height: 1.5;
        }
        .footer {
            margin-top: 30px;
            padding-top: 15px;
            border-top: 1px solid #ddd;
            font-size: 11px;
            color: #999;
            text-align: center;
        }
        .sin-comentarios {
            color: #999;
            font-style: italic;
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Historial del Ticket #{{ $ticket->id }}</h1>
            <p>Generado el {{ now()->format('d/m/Y H:i') }}</p>
        </div>

        <div class="section">
            <div class="section-title">Información General</div>
            <div class="info-row">
                <div class="info-label">ID del Ticket:</div>
                <div class="info-value">#{{ $ticket->id }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Título:</div>
                <div class="info-value">{{ $ticket->titulo }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Estado:</div>
                <div class="info-value">
                    <span class="badge {{ $ticket->estado ? 'badge-success' : 'badge-danger' }}">
                        {{ $ticket->estado ? 'Activo' : 'Inactivo' }}
                    </span>
                </div>
            </div>
            <div class="info-row">
                <div class="info-label">Cliente:</div>
                <div class="info-value">{{ $ticket->cliente->nombre ?? 'N/A' }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Usuario Asignado:</div>
                <div class="info-value">{{ $ticket->usuarioAsignado->name ?? 'Sin asignar' }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Registrado Por:</div>
                <div class="info-value">{{ $ticket->registrado_por ?? 'Sistema' }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Fecha de Creación:</div>
                <div class="info-value">{{ $ticket->fecha_creacion ?? 'N/A' }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Fecha de Cierre:</div>
                <div class="info-value">{{ $ticket->fecha_cierre ?? 'Sin cerrar' }}</div>
            </div>
        </div>

        <div class="section">
            <div class="section-title">Descripción</div>
            <div class="info-value" style="padding: 10px; background-color: #f8f9fa; border-radius: 4px;">
                {{ $ticket->descripcion ?? 'Sin descripción' }}
            </div>
        </div>

        @if($ticket->comentarios->count())
        <div class="section">
            <div class="section-title">Historial de Comentarios ({{ $ticket->comentarios->count() }})</div>
            @foreach($ticket->comentarios as $comentario)
            <div class="comentario">
                <div class="comentario-header">
                    {{ $comentario->usuario->name ?? 'N/A' }}
                    <span class="comentario-fecha">{{ $comentario->fecha }}</span>
                </div>
                <div class="comentario-texto">
                    {{ $comentario->mensaje }}
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="section">
            <div class="section-title">Historial de Comentarios</div>
            <div class="sin-comentarios">No hay comentarios en este ticket</div>
        </div>
        @endif

        <div class="footer">
            <p>Este documento es un reporte generado automáticamente del sistema de tickets.</p>
            <p>Reporte generado: {{ now()->format('d/m/Y H:i:s') }}</p>
        </div>
    </div>
</body>
</html>
