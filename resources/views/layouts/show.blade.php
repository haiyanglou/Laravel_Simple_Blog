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

        @if (Auth::user())
        <div class="row">
        <!--show detail-->
        <div class="col-sm-4">
        <a href="{{ url('/post') }}" class="btn btn-success btn-lg btn-block">Mainpage</a>
        </div>
        <!--update-->
        <div class="col-sm-4">
        <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary btn-lg btn-block">Edit</a>
        </div>
        <!--delete-->
        <div class="col-sm-4">
        <form method="POST" action="{{ route('post.destroy', $post->id) }}">
        <input type="submit" value="Delete" class="btn btn-danger btn-lg btn-block">
        <input type="hidden" name="_token" value="{{ Session::token() }}">
        {{ method_field('DELETE') }}
        </form>        
        </div>

        @else
        @endif

    </article> 
@endsection