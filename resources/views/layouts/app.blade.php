<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-RbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        header {
            background: #fff;
            border-bottom: 1px solid #e5e5e5;
            padding: 1rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-family: 'Segoe UI', sans-serif;
        }
        header h1 {
            font-size: 1rem;
            font-weight: 700;
            letter-spacing: .1em;
            text-transform: uppercase;
            color: #333;
            margin: 0;
        }
        .header-right {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        .header-right span {
            font-size: .85rem;
            color: #888;
        }
        .btn-logout {
            background: none;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: .35rem .9rem;
            font-size: .8rem;
            font-weight: 600;
            color: #555;
            cursor: pointer;
            text-decoration: none;
        }
        .btn-logout:hover {
            background: #f5f5f5;
            color: #222;
        }
    </style>

</head>
<body>
    <div id="app">
        <header>
            <h1>SISTEMA DE TICKETS</h1>
            @auth
                <div class="header-right">
                    <span>{{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" style="margin:0">
                        @csrf
                        <button type="submit" class="btn-logout">{{ __('Cerrar sesión') }}</button>
                    </form>
                </div>
            @endauth
        </header>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
