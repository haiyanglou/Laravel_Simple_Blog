@extends('welcome')

@section('sidebar')
<aside>
    <header>
    <h1><a href="http://www.haiyanglou.com/ " target="_blank">Haiyang's Easy Blog</a><h1>
    <h4>
        I utilized Laravel Framework 5.5, PHP, HTML, CSS, Sass, Vue.js technologies by designing and building this simple blog system<br /><br />
        November 2017
    </h4>
    </header>

    <hr>
    <nav>
    <a href="https://www.utdallas.edu/~haiyang.lou " target="_blank" class="nav-item">
    AAA1
    <span class="nav-description">Implement Later, the left side links could refer to most viewed articles or most marked articles.</span>
    </a>
    
    <a href="#article2" target="_blank" class="nav-item">
    AAA2
    <span class="nav-description">Implement Later, the left side links could refer to most viewed articles or most marked articles.</span>
    </a>

    <a href="https://www.utdallas.edu/~haiyang.lou " target="_blank" class="nav-item">
    AAA3
    <span class="nav-description">Implement Later, the left side links could refer to most viewed articles or most marked articles.</span>
    </a>

    <a href="https://www.utdallas.edu/~haiyang.lou " target="_blank" class="nav-item">
    AAA4
    <span class="nav-description">Implement Later, the left side links could refer to most viewed articles or most marked articles.</span>
    </a>
    </nav>

    <br /><br /><br />
    <hr>
    <p1>
        Copyright &copy; 2017 Haiyang Lou<br />
		<a href="http://www.haiyanglou.com/">To My Website</a>
    </p1>
</aside>
@endsection

@section('post')
<div class="articles">  
    <article class="post-excerpt">
        <h2><a href="https://www.utdallas.edu/">UT DALLAS</a><h2>
        <div class="excerpt">
        (PRESET ARTICLE)<br />
        The University of Texas at Dallas (UTD or UT Dallas) is a public research university in the University of Texas System.<br /><br />
        The main campus is in the Richardson, Texas, Telecom Corridor, 18 miles (29 km) north of downtown Dallas. The institution, established in 1961 as the Graduate Research Center of the Southwest and later renamed the Southwest Center for Advanced Studies (SCAS), began as a research arm of Texas Instruments. In 1969, the founders bequeathed SCAS to the state of Texas officially creating The University of Texas at Dallas.
        </div>
    </article> 

    <article class="post-excerpt">
        <h2><a href="https://www.uni-stuttgart.de/">UNI STUTTGART</a><h2>
        <div class="excerpt">
        (PRESET ARTICLE)<br />
        The University of Stuttgart (German: Universität Stuttgart) is a university located in Stuttgart, Germany. It was founded in 1829 and is organized into 10 faculties.<br /><br />
        It is one of the top nine leading technical universities in Germany (TU9) with highly ranked programs in civil, mechanical, industrial and electrical engineering.<br /><br />
        Along with the Technical University of Munich, the Technical University of Darmstadt and Karlsruhe Institute of Technology, it represents one of the four members of the South German Axis of Advanced Engineering and Management. These four universities, in combination with RWTH Aachen are the top five universities of the aforementioned TU9.
        </div>
    </article> 
    
    @foreach ($posts as $post)
    <article class="post-excerpt">
        <h2><a href="post/{{$post->id}}">{{$post->title}}</a></h2>
        <div class="excerpt">
        <!--{{$post->body}}-->
        {!!nl2br(e($post->body))!!}
        <!--{!!nl2br(substr($post->body, 0, 200))!!}{{strlen($post->body)>200 ? "...":""}}-->
        @if (Auth::user())
        <br />

        <div class="row">
        <!--show detail-->
        <div class="col-sm-2">
        <a href="{{ route('post.show', $post->id) }}" class="btn btn-success btn-block">Details</a>
        </div>
        <!--update-->
        <div class="col-sm-2">
        <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary btn-block">Edit</a>
        </div>
        <!--delete-->
        <div class="col-sm-2">
        <form method="POST" action="{{ route('post.destroy', $post->id) }}">
        <input type="submit" value="Delete" class="btn btn-danger btn-block">
        <input type="hidden" name="_token" value="{{ Session::token() }}">
        {{ method_field('DELETE') }}
        </form>        
        </div>
        @else
        @endif

        </div>
    </article> 
    @endforeach

    <!--Pagination-->
    <div class="text-center">
    {!! $posts->links(); !!}
    </div>
    <hr>

</div>
@endsection


@section('create')
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