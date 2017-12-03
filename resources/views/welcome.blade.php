<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Simple Blog</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
    </head>
    
    <body id="@yield('body_id')">        
        @include('layouts/navbar')
                
        <div id="app">
        @yield('sidebar')
        
        <main>
        @yield('content')

        @yield('post')
        @yield('create')
        
        </main> 
        </div>
        
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>   
    </body>
</html>