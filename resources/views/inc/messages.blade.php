@if(count($errors) > 0)
    <div class="container pb-2">
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                {{$error}}
            </div>
        @endforeach
    </div>
@endif

@if(session('success'))
    <div class="container pb-2">
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    </div>
@endif

@if(session('error'))
    <div class="container pb-2">
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
               
    </div>
@endif
               