<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Het Laatste Nieuws')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <x-navbar></x-navbar>    

    <main>
        @yield('content')
    </main>

    <footer>
        <x-footer></x-footer>
    </footer>

</body>
</html>