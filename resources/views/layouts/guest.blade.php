<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @if(Route::is('register'))
            <title>IMDIBIL - Регистрация</title>
            <meta name="description" content="IMDIBIL - Регистрация"/>
        @elseif(Route::is('login'))
            <title>IMDIBIL - Авторизация</title>
            <meta name="description" content="IMDIBIL - Авторизация"/>
        @elseif(Route::is('password.request'))
            <title>IMDIBIL - Восстановление пароля</title>
            <meta name="description" content="IMDIBIL - Восстановление пароля"/>
        @endif
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link rel="shortcut icon" href="https://imdibil.ru/image/favicon.svg" type="image/x-icon">

    </head>
    <body class="bg-dark">
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
    </body>
</html>
