@extends('welcome')

@section('content')
<!-- Authentication Links -->
@if (Auth::user())
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <h1>Create New Post</h1>
    <hr>
    <form method="POST" action="{{ route('post.store') }}">
    {{ csrf_field() }}
      <div class="form-group">
        <label name="title">Title:</label>
        <input id="title" name="title" class="form-control">
        <!--<textarea id="title" name="title" rows="2" class="form-control"></textarea>-->
      </div>
      <div class="form-group">
        <label name="body">Post:</label>
        <textarea id="body" name="body" rows="10" class="form-control"></textarea>
      </div>
      <input type="submit" value="Create Post" class="btn btn-success btn-lg btn-block">
      <input type="hidden" name="_token" value="{{ Session::token() }}">
    </form>
  </div>
</div>
@else
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <h1>Login first to post new articles</h1>
  </div>
</div>    
@endif

@endsection 