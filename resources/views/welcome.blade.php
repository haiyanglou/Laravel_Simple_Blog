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
        
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif
        </div>

        <div id="app">
        @include('layouts.sidebar')
        <main>
        @include('layouts.posts')
        </main> 
        </div>
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>   
    </body>
</html>