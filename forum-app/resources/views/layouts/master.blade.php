<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @yield('head')
    </head>

    <body class = "antialiased">
        <div class="header">
            @yield('header')
        </div>
        
            @yield('login')

        <div class="d-flex justify-content-around container">
            @yield('hero')
            @yield('content')
        </div>
    </body>
</html>
