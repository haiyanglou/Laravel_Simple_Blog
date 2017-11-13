<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Simple Blog</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans:400,700|Noto+Serif:400,700" rel="stylesheet" type="text/css">
        {!! script_ts('/css/app.css') !!}
    </head>
    
    <body id="@yield('body_id')">
        <div id="app">
        @include('layout.sidebar')
        <main>
            @yield('content')
        </main> 
        </div>
        {!! script_ts('/js/app.js') !!}
    </body>
</html>