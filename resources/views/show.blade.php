@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$ringtone->title}}</div>

                <div class="card-body">
                    <audio controls controlsList="nodownload">
                        <source src="/audio/{{$ringtone->file}}" type="audio/ogg">
                    </audio>
                </div>
                <div class="card-footer">
                <form action="{{route('ringtones.download',[$ringtone->id])}}" method="post">@csrf
                   <button class="btn btn-secondary btn-sm" type="submit">Download</button>
                </form>   
                </div>
                
            </div>

            <table class="table mt-4 bg-secondary text-white">
                <tr>
                    <th>Name</th>
                    <td>{{$ringtone->title}}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{{$ringtone->description}}</td>
                </tr>
                <tr>
                    <th>Format</th>
                    <td>{{$ringtone->format}}</td>
                </tr>
                <tr>
                    <th>Size</th>
                    <td>{{$ringtone->size}}</td>
                </tr>
                <tr>
                    <th>Category</th>
                    <td>{{$ringtone->category->name}}</td>
                </tr>
                <tr>
                    <th>Download</th>
                    <td>{{$ringtone->download}}</td>
                </tr>
        </table>
        </div>

        <div class="col-md-4">
            <div class="card-header bg-dark text-primary">Groups</div>
             @foreach(App\Models\Category::all() as $category)
                <div class="card-header" style="background-color:#ccc;"> <a href="{{route('ringtones.category',[$category->id])}}">{{$category->name}}</a></div>
             @endforeach
        </div>
    </div>
</div>
@endsection
