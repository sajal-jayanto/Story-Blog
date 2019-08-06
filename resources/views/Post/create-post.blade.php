@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-center"> Create a new story </h5>
                    <hr>
                    <form method="POST" action="{{ route('posts.store') }}" enctype = "multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="font-weight-bold" for="inputAddress">Title *</label>
                            <input type="text" class="form-control" name="title" placeholder="Title">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="inputPassword4">Story Type *</label>
                            <input type="text" class="form-control" name="category" placeholder="Category">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="inputAddress2">Description*</label>
                            <textarea class="form-control" rows="8" id= "article-ckeditor" name="description" name="text"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="inputCity">Image *</label>
                            <input type="file" class="form-control-file border" name="image">
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection