<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f4f4;
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
        }

        .card{
            background:white;
            padding:40px;
            border-radius:10px;
            box-shadow:0 10px 25px rgba(0,0,0,0.1);
            text-align:center;
            width:300px;
        }

        h1{
            margin-bottom:30px;
        }

        .btn{
            display:block;
            margin:10px 0;
            padding:10px;
            text-decoration:none;
            border-radius:5px;
            font-weight:bold;
        }

        .login{
            background:#3490dc;
            color:white;
        }

        .register{
            background:#38c172;
            color:white;
        }

        .btn:hover{
            opacity:0.9;
        }
    </style>
</head>
<body>

<div class="card">
    <h1>Bienvenido</h1>

    @auth
        <a href="{{ url('/dashboard') }}" class="btn login">
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