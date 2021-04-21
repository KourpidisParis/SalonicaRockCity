@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Session::has('message'))
              <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif
            <div class="card">
                <div class="card-header">Create Ringtone</div>

                <div class="card-body">
                    <form action="{{route('ringtones.store')}}" method="post" enctype="multipart/form-data">@csrf
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
                            <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" accept="audio/*">
                            @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                                <label>Choose category</label>
                                <select class="form-control  @error('category') is-invalid @enderror" name="category">
                                    <option value="">Select category</option>
                                    @foreach(App\Models\Category::all() as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                    
                                </select>
                                @error('category')
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
