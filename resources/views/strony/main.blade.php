<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>
<body>
    <header>
        <h1>@yield('header')</h1>
        <nav>
            <ul>
                <li><a href="{{route('home') }}">Strona główna</a></li>
                <li><a href="{{route('home1') }}">O nas</a></li>
                <li><a href="{{route('home2',['url'=>'ddssdsdsdsdsdds']) }}">Kontakt</a></li>
                <li><a href="{{route('home2',['url'=>'sddskldslkjsdjksdf']) }}">Kontakt</a></li>
            </ul>
        </nav>
    </header>
    <main>
            @yield('content')
    </main>

    <footer>
        <p>&copy; 2023 Twoja Strona</p>
    </footer>
</body>
</html>