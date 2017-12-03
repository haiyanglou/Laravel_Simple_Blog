@extends('welcome')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Welcome to Simple Blog!</h2></div>

                <div class="panel-body">
                @if (Auth::guest())
                    <p>Under guest model you could only view articles, you could Sign In/Register to Post Articles</p2>
                @else
                    <h1>Hello, {{ Auth::user()->name }}!</h1>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
