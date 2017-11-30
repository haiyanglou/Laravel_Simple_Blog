@extends('welcome')

@section('content')

    <article class="post-excerpt">
    <h1>The post was successfully saved!</h1>
    <hr>
    <h2><a href="{{ url('/post') }}">{{ $post->title }}</a></h2>
        <div class="excerpt">
        {{ $post->body }}
        </div>
    </article> 
</div>
@endsection