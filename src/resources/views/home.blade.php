<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alldone App</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @livewireStyles
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>

<body>
    <div class="container mx-auto">
        @livewire('todos')
    </div>
    @livewireScripts
    {{-- <script src="{{ asset('js/myjs.js') }}"></script> --}}

</body>

</html>