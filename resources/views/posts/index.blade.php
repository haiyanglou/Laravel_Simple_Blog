@extends('layout')


@section('content')
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

    

    <div class="articles">
        <article class="post-excerpt" id="article1">
            <h2><a herf="#">About Me</a></h2>
            <div class="excerpt">
            I AM CURRENTLY A GRADUATE STUDENT MAJORING IN COMPUTER SCIENCE AT THE UNIVERSITY OF TEXAS AT DALLAS. BEFORE PURSUING MY MASTER'S STUDY AT UT DALLAS, I WAS AN UNDERGRADUATE STUDENT AT THE UNIVERSITY OF STUTTGART IN GERMANY. MY MAJOR WAS ELECTRICAL ENGINEERING AND INFORMATION TECHNOLOGY.
            </div>
        </article>    

        <article class="post-excerpt" id="article2">
            <h2><a herf="#">About Me</a></h2>
            <div class="excerpt">
            I AM CURRENTLY A GRADUATE STUDENT MAJORING IN COMPUTER SCIENCE AT THE UNIVERSITY OF TEXAS AT DALLAS. BEFORE PURSUING MY MASTER'S STUDY AT UT DALLAS, I WAS AN UNDERGRADUATE STUDENT AT THE UNIVERSITY OF STUTTGART IN GERMANY. MY MAJOR WAS ELECTRICAL ENGINEERING AND INFORMATION TECHNOLOGY.
            </div>
        </article> 

        <article class="post-excerpt">
            <h2><a herf="#">About Me</a></h2>
            <div class="excerpt">
            I AM CURRENTLY A GRADUATE STUDENT MAJORING IN COMPUTER SCIENCE AT THE UNIVERSITY OF TEXAS AT DALLAS. BEFORE PURSUING MY MASTER'S STUDY AT UT DALLAS, I WAS AN UNDERGRADUATE STUDENT AT THE UNIVERSITY OF STUTTGART IN GERMANY. MY MAJOR WAS ELECTRICAL ENGINEERING AND INFORMATION TECHNOLOGY.
            </div>
        </article> 

        <article class="post-excerpt">
            <h2><a herf="#">About Me</a></h2>
            <div class="excerpt">
            I AM CURRENTLY A GRADUATE STUDENT MAJORING IN COMPUTER SCIENCE AT THE UNIVERSITY OF TEXAS AT DALLAS. BEFORE PURSUING MY MASTER'S STUDY AT UT DALLAS, I WAS AN UNDERGRADUATE STUDENT AT THE UNIVERSITY OF STUTTGART IN GERMANY. MY MAJOR WAS ELECTRICAL ENGINEERING AND INFORMATION TECHNOLOGY.
            </div>
        </article> 
    </div>

@stop