@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-thumbnail" src="/storage/images/{{$post->image}}" height="200px" alt=""/>
                    </div>
                    <hr>
                    <h4 class="text-center"> {{$post->title}} </h4>
                    <hr>
                    <p> {!! $post->description !!} </p>
                </div>
            </div>
            @foreach ($comments as $comment)
                <div>
                    {{ $comment->comment }}
                    <br>
                </div>
            @endforeach
            <form method="POST" action="{{ route('comment.id' , $post->id) }}">
                @csrf
                <div class="form-group">
                    <label for="comment">Post Your Comment:</label>
                    <textarea class="form-control" rows="3" name="comment"></textarea>
                </div>
                <button type="submit" class="btn btn-primary float-right">Post</button>
            </form>
        </div>
    </div>
</div>
@endsection