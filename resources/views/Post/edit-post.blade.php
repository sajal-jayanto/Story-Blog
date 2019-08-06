@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-center"> Create a new story </h5>
                    <hr>
                    <form method="POST" action="{{ route('posts.update' , $post->id) }}" enctype = "multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        @csrf
                        <div class="form-group">
                            <label class="font-weight-bold" for="inputAddress">Title *</label>
                        <input type="text" class="form-control" name="title" value="{{$post->title}}">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="inputPassword4">Story Type *</label>
                            <input type="text" class="form-control" name="category" value="{{$post->category}}">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="inputAddress2">Description*</label>
                            <textarea class="form-control" rows="8" id= "article-ckeditor" name="description" name="text"> value="{{$post->description}}"</textarea>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="inputCity">Image *</label>
                            <input type="file" class="form-control-file border" name="image">
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection