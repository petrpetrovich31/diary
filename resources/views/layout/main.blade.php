<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Petr Petrovich Петр Петрович">
        <meta name="robots" content="index, follow">
        <meta name="keywords" content="Petr Petrovich, Петр Петрович, Пётр Петрович">
        <title>Petr Petrovich © </title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/css/styles.min.css') }}">
    </head>
    <body>
        <div class="page" id="app">
            @include('layout.header')
            <div class="content">
                @yield('content')
            </div>
            @include('layout.footer')
        </div>
        <script src="{{ asset('/js/all.min.js') }}"></script>
    </body>
</html>
