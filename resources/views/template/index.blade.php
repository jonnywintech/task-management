<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title'?? env('APP_NAME'))</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('vite_file')
</head>
<body>
    @include('partials.header')
    @yield('content')
    @include('partials.footer')
</body>
</html>