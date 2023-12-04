<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
      @vite('resources/css/app.css')

    </head>

     @php
      $route = request()->route()->getName();
      dump($route);
    @endphp

    <body class=" bg-red-500 h-50 p-4 flex items-center justify-center">
      <h1>Teste TailwindCss</h1>
    </body>
</html>
