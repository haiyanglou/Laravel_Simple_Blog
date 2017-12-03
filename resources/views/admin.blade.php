@extends('welcome')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Admin Dashboard</h3></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>Hello, {{ Auth::user()->name }}!<br />
                        You are logged in as Admin!
                    </h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection