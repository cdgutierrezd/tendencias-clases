<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Segoe UI', sans-serif; background: #f7f7f7; display: flex; justify-content: center; align-items: center; height: 100vh; }
        .card { background: #fff; border: 1px solid #e5e5e5; border-radius: 8px; box-shadow: 0 2px 12px rgba(0,0,0,.06); padding: 2.5rem 2rem; text-align: center; width: 320px; }
        h1 { font-size: 1rem; font-weight: 600; letter-spacing: .08em; text-transform: uppercase; color: #888; margin-bottom: 1.8rem; }
        .btn { display: block; margin: .6rem 0; padding: .55rem 1.2rem; border-radius: 5px; font-size: .85rem; font-weight: 600; text-decoration: none; }
        .login { background: #222; color: #fff; }
        .login:hover { background: #444; }
        .register { background: #fff; color: #222; border: 1px solid #ddd; }
        .register:hover { background: #f0f0f0; }
    </style>
</head>
<body>

<div class="card">
    <h1>Bienvenido</h1>

    @auth
        <a href="{{ url('/home') }}" class="btn login">
            Ir al Dashboard
        </a>
    @else
        <a href="{{ route('login') }}" class="btn login">
            Iniciar Sesión
        </a>

        <a href="{{ route('register') }}" class="btn register">
            Registrarse
        </a>
    @endauth
</div>

</body>
</html>