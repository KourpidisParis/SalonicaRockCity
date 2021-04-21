@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    @foreach($wallpapers as $wallpaper)
        <div class="col-md-8 mt-4">
            <div class="card">
                <div class="card-body wallpaper-card">
                <p class="photo-image"><img src="uploads/{{$wallpaper->file}}" class="img-thumbnail wallpaper-image"></p>
                <h1>{{$wallpaper->title}}</h1>
                <p class="photo-description">{{$wallpaper->description}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
           <form action="{{route('download1',[$wallpaper->id])}}" method="post">@csrf
               <button class="btn btn-secondary mt-4" type="submit">Download 800x600</button>
           </form>

           <form action="{{route('download2',[$wallpaper->id])}}" method="post">@csrf
               <button class="btn btn-secondary mt-4" type="submit">Download 118x95</button>
           </form>

           <form action="{{route('download3',[$wallpaper->id])}}" method="post">@csrf
               <button class="btn btn-secondary mt-4" type="submit">Download 316x215</button>
           </form>

           <form action="{{route('download4',[$wallpaper->id])}}" method="post">@csrf
               <button class="btn btn-secondary mt-4" type="submit">Download 1280x1024</button>
           </form>
        </div>
        @endforeach
        {{$wallpapers->links()}}
    </div>
</div>
@endsection
