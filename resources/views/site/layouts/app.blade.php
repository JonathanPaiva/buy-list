<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} @yield('title')</title>

        @vite(['resources/sass/app.scss','resources/js/app.js'])    

    </head>

    <body class="container">

        @include('site.layouts.navigation')
        
        <div class="container">

            @yield('content')
        
        </div>

    </body>

</html>