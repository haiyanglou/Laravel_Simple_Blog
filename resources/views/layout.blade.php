<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Simple Blog</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans:400,700|Noto+Serif:400,700" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
    </head>
    
    <body id="@yield('body_id')">
        <div id="app">
        @include('layout.sidebar')
        <main>
            @yield('content')
            <p>ddd</p>
        </main> 
        </div>
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>   
    </body>
</html>