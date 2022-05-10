<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- yield nos permite sobreescribir valores asignados --}}
    <title>MyCMS | @yield('title')</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
{{-- Vista maestra que administrara el logueo, errores entre otros --}}

<body>
    @section('content')
    @show
</body>

</html>
