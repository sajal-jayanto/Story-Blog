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
        </div>
    </div>
</div>
@endsection