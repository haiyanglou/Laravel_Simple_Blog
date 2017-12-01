@extends('welcome')

@section('content')

    <article class="post-excerpt">
    <h1>Post Article No. {{$post->id}}</h1>
    <hr>
    <h2><a href="{{ url('/post') }}">{{ $post->title }}</a></h2>
        <div class="excerpt">
        {!!nl2br(e($post->body))!!}
        </div>
    </article> 
</div>
@endsection