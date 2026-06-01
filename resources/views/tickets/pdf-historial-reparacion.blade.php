<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Historial de Reparación - {{ $cliente->nombre }}</title>
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
        .header .subtitle {
            color: #666;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .header p {
            color: #666;
            font-size: 12px;
        }
        .ticket-block {
            page-break-inside: avoid;
            margin-bottom: 25px;
            border: 2px solid #007bff;
            border-radius: 5px;
            overflow: hidden;
            background-color: #fff;
        }
        .ticket-header {
            background-color: #007bff;
            color: white;
            padding: 15px;
            font-size: 14px;
            font-weight: bold;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .ticket-id {
            font-size: 16px;
        }
        .ticket-status {
            background-color: rgba(255,255,255,0.3);
            padding: 3px 8px;
            border-radius: 3px;
            font-size: 12px;
        }
        .timeline {
            padding: 15px;
        }
        .timeline-item {
            position: relative;
            padding-left: 30px;
            margin-bottom: 20px;
            border-left: 3px solid #007bff;
            padding-bottom: 15px;
        }
        .timeline-item:last-child {
            border-left: 3px solid #28a745;
        }
        .timeline-dot {
            position: absolute;
            left: -8px;
            top: 0;
            width: 12px;
            height: 12px;
            background-color: #007bff;
            border-radius: 50%;
            border: 2px solid white;
        }
        .timeline-item:last-child .timeline-dot {
            background-color: #28a745;
        }
        .timeline-date {
            font-weight: bold;
            color: #007bff;
            font-size: 12px;
            margin-bottom: 3px;
        }
        .timeline-title {
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
            font-size: 13px;
        }
        .timeline-content {
            color: #555;
            font-size: 11px;
            line-height: 1.5;
            background-color: #f8f9fa;
            padding: 10px;
            border-radius: 3px;
            margin-top: 5px;
        }
        .badge {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 3px;
            font-size: 10px;
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
        .badge-primary {
            background-color: #007bff;
            color: white;
        }
        .info-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 15px;
            font-size: 11px;
        }
        .info-item {
            flex: 1;
            min-width: 150px;
        }
        .info-label {
            font-weight: bold;
            color: #666;
            display: block;
            margin-bottom: 3px;
        }
        .info-value {
            color: #333;
        }
        .sin-tickets {
            text-align: center;
            padding: 30px;
            color: #999;
            font-style: italic;
        }
        .footer {
            margin-top: 30px;
            padding-top: 15px;
            border-top: 1px solid #ddd;
            font-size: 10px;
            color: #999;
            text-align: center;
        }
        .resumen {
            background-color: #f8f9fa;
            border: 1px solid #007bff;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 20px;
            font-size: 11px;
        }
        .resumen h3 {
            color: #007bff;
            font-size: 13px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📋 Historial de Reparación</h1>
            <div class="subtitle">Cliente: {{ $cliente->nombre }}</div>
            <p>Total de tickets: {{ count($tickets) }}</p>
            <p>Generado el {{ now()->format('d/m/Y H:i') }}</p>
        </div>

        @if(count($tickets) > 0)
            <div class="resumen">
                <h3>📊 Resumen</h3>
                <div class="info-grid">
                    <div class="info-item">
                        <span class="info-label">Total de Tickets:</span>
                        <span class="info-value">{{ count($tickets) }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Activos:</span>
                        <span class="info-value">{{ $tickets->where('estado', true)->count() }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Inactivos:</span>
                        <span class="info-value">{{ $tickets->where('estado', false)->count() }}</span>
                    </div>
                </div>
            </div>

            @foreach($tickets as $ticket)
            <div class="ticket-block">
                <div class="ticket-header">
                    <div class="ticket-id">
                        Ticket #{{ $ticket->id }} - {{ $ticket->titulo }}
                    </div>
                    <div class="ticket-status">
                        <span class="badge {{ $ticket->estado ? 'badge-success' : 'badge-danger' }}">
                            {{ $ticket->estado ? 'ACTIVO' : 'INACTIVO' }}
                        </span>
                    </div>
                </div>

                <div class="timeline">
                    <!-- CREACIÓN DEL TICKET -->
                    <div class="timeline-item">
                        <div class="timeline-dot"></div>
                        <div class="timeline-date">📅 {{ \Carbon\Carbon::parse($ticket->fecha_creacion)->format('d/m/Y H:i') }}</div>
                        <div class="timeline-title">TICKET CREADO</div>
                        <div class="info-grid">
                            <div class="info-item">
                                <span class="info-label">Registrado Por:</span>
                                <span class="info-value">{{ $ticket->registrado_por ?? 'Sistema' }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Cliente:</span>
                                <span class="info-value">{{ $ticket->cliente->nombre ?? 'N/A' }}</span>
                            </div>
                        </div>
                        <div class="timeline-content">
                            <strong>Error Reportado:</strong><br>
                            {{ $ticket->descripcion ?? 'Sin descripción' }}
                        </div>
                    </div>

                    <!-- ASIGNACIÓN -->
                    <div class="timeline-item">
                        <div class="timeline-dot"></div>
                        <div class="timeline-date">👤 Asignado a {{ $ticket->usuarioAsignado->name ?? 'Sin asignar' }}</div>
                        <div class="timeline-title">TICKET ASIGNADO</div>
                    </div>

                    <!-- COMENTARIOS (SEGUIMIENTO) -->
                    @forelse($ticket->comentarios as $comentario)
                    <div class="timeline-item">
                        <div class="timeline-dot"></div>
                        <div class="timeline-date">💬 {{ \Carbon\Carbon::parse($comentario->fecha)->format('d/m/Y H:i') }}</div>
                        <div class="timeline-title">Actualización de {{ $comentario->usuario->name ?? 'N/A' }}</div>
                        <div class="timeline-content">
                            {{ $comentario->mensaje }}
                        </div>
                    </div>
                    @empty
                    @endforelse

                    <!-- CIERRE -->
                    <div class="timeline-item">
                        <div class="timeline-dot"></div>
                        @if($ticket->fecha_cierre)
                            <div class="timeline-date">✅ {{ \Carbon\Carbon::parse($ticket->fecha_cierre)->format('d/m/Y H:i') }}</div>
                            <div class="timeline-title">TICKET CERRADO</div>
                            <div class="timeline-content">
                                El cliente ha dado el <strong>VISTO BUENO</strong> y el ticket ha sido cerrado.
                            </div>
                        @else
                            <div class="timeline-date">⏳ Pendiente</div>
                            <div class="timeline-title">TICKET EN PROCESO</div>
                            <div class="timeline-content">
                                Este ticket aún está en proceso y pendiente de cierre.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <div class="sin-tickets">
                No hay tickets registrados para este cliente
            </div>
        @endif

        <div class="footer">
            <p>Este documento es un reporte generado automáticamente del sistema de tickets.</p>
            <p>Incluye el historial completo de reparaciones con fechas, asignaciones y actualizaciones.</p>
            <p>Reporte generado: {{ now()->format('d/m/Y H:i:s') }}</p>
        </div>
    </div>
</body>
</html>
