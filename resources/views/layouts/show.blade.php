@extends('welcome')

@section('content')

    <article class="post-excerpt">
    <h1>Post Article No. {{$post->id}}</h1>
    <hr>
    <h2><a href="{{ url('/post') }}">{{ $post->title }}</a></h2>
        <div class="excerpt">
        {!!nl2br(e($post->body))!!}
        </div>
        
        @if (Auth::user())
        <hr>
        <dl>
            <dt>Created at:</dt>
            <dd>{{ date('M j, Y h:i:sa', strtotime($post->created_at)) }}</dd>
        </dl>

        <dl>
            <dt>Last updated:</dt>
            <dd>{{ date('M j, Y h:i:sa', strtotime($post->updated_at)) }}</dd>
        </dl>
        @else
        @endif    
    </article> 
@endsection