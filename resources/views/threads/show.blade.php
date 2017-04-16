@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="#">
                            {{$thread->creator->name}}
                        </a> posted:
                        {{ $thread->title }}
                    </div>

                    <div class="panel-body">
                        {{ $thread->body }}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('threads.replies')
            </div>
        </div>
        <hr>
        @if(auth()->check())
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form method='post' action="{{ $thread->path() .'/replies'}}" >
                    {{ csrf_field() }}
                    <div class="form-group">
                        <textarea class='form-control' name="body" 
                        cols="30" rows="5" placeholder='Add a comment here...'>
                        </textarea>
                    </div>
                    <button class="btn btn-default">Post</button>
                </form>
            </div>
            <br><br>
        </div>
        @else
        <p class='text-center'>
            You need to <a href="{{ route('login') }}"> Sign in</a> to comment
        </p>
        @endif
    </div>
@endsection
