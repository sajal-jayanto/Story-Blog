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
            <div class="container">
            <h5 class="mt-3 mb-3"> Comments </h5>
            @foreach ($comments as $comment)
                <div class="card mt-3">
                    <div class="card-header">  </div>
                    <div class="card-body">
                        <h5 class="text-primary">  {{ $comment->user_name }} </h5>
                        <p class="font-italic"> {{ $comment->comment }} </p>
                    </div>
                </div>
            @endforeach
            <form method="POST" action="{{ route('comment.id' , $post->id) }}">
                @csrf
                <div class="form-group mt-2">
                    <label for="comment"> <h6 > Post Your Comment: </h6> </label>
                    <textarea class="form-control" rows="4" name="comment"></textarea>
                </div>
                <button type="submit" class="btn btn-primary float-right">Post</button>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection