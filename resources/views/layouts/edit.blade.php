@extends('welcome')

@section('content')
@if (Auth::user())
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <h1>Update Post No. {{$post->id}}</h1>
    <hr>
    <form method="POST" action="{{ route('post.update', $post->id) }}">
    {{ csrf_field() }}
    <!--HERE WE NEED TO USE PUT, SO WRITE FOLLOW-->
    {{ method_field('PUT') }}
      <div class="form-group">
        <label name="title">Title:</label>
        <textarea type="text" class="form-control" id="title" name="title" rows="1">{{ $post->title }}</textarea>
      </div>

      <div class="form-group">
        <label name="body">Post:</label>
        <textarea type="text" class="form-control" id="body" name="body" rows="10">{{ $post->body }}</textarea>
      </div>

      <hr>
      <dl>
      <!--<dl class="dl-horizontal">-->
        <dt>Created at:</dt>
        <dd>{{ date('M j, Y h:i:sa', strtotime($post->created_at)) }}</dd>
      </dl>

      <dl>
      <!--<dl class="dl-horizontal">-->
        <dt>Last updated:</dt>
        <dd>{{ date('M j, Y h:i:sa', strtotime($post->updated_at)) }}</dd>
      </dl>

      <div class="row">
        <div class="col-sm-6">
           <a href="{{ route('post.show', $post->id) }}" class="btn btn-danger btn-lg btn-block">Back</a>
        </div>
        <div class="col-sm-6">
           <!--<input type="submit" value="Save Update" class="btn btn-success btn-lg btn-block">-->
           <button type="submit" class="btn btn-success btn-lg btn-block">Save Update</button>
           <input type="hidden" name="_token" value="{{ Session::token() }}">
        </div>
      </div>
    </form>
  </div>
</div>
@else
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <h1>Login first to edit post.</h1>
  </div>
</div>    
@endif


@endsection 