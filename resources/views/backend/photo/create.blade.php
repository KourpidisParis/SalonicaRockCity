@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Session::has('message'))
              <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif
            <div class="card">
                <div class="card-header">Upload photo</div>

                <div class="card-body">
                    <form action="{{route('photos.store')}}" method="post" enctype="multipart/form-data">@csrf
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror">
                            @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Description</label>
                            <input type="text" name="description" class="form-control @error('description') is-invalid @enderror">
                            @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">File</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                            @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                           <button class="btn btn-primary" type="submit">Create</button>
                        </div>
                    
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
