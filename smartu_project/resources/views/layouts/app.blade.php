<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <!-- Basics -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Title -->
    <title>
        @if (!empty($title))
            {{ $title.' - '.config('app.name') }}
        @else
            {{ config('app.name') }}
        @endif
    </title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <header>
            @include('layouts._header')
        </header>
        <main>
            @include('layouts._messages')
            @yield('content')
        </main>
        <footer>
            @include('layouts._footer')
        </footer>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('/vendors/ckeditor/ckeditor.js') }}"></script>
</body>
</html>
