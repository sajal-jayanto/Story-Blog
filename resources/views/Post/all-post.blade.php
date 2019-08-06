@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($posts as $post)
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <img  src="/storage/images/{{$post->image}}" width="200px" height="200px" alt=""/>
                    </div>
                    <div class="col-md-9">
                        <a href="{{ route('posts.show' , $post->id) }}"><h5 class="card-title">{{$post->title}}</h5></a> 
                        <style>
                            #dash { width: 90% ; height: 90px; overflow: hidden; }
                        </style>
                        
                        <div id="dash">
                            <p> {!! $post->description !!} </p>
                        </div>
                        
                        <style>
                            var p = $('#dash p');
                            var ks = $('#dash').height();
                            while ($(p).outerHeight() > ks) {
                                $(p).text(function(index, text) { 
                                    return text.replace(/\W*\s(\S)*$/, '...');
                                });
                            }
                        </style>

                        <small class="card-title">by {{$post->name}}</small>
                        <br>
                        <small> <p class="card-text">{{$post->created_at}}</p> </small> 
                        <div class="float-right form-inline">
                            <a href="{{ route('posts.edit' , $post->id) }}" class="btn btn-primary">Edit</a>
                            <form class="pl-2" action="{{ url('posts', ['id' => $post->id]) }}" method="post">
                                @csrf
                                <input class="btn btn-danger" type="submit" value="Delete" />
                                <input type="hidden" name="_method" value="delete" />
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
