@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if(count($ringtones)>0)
        @foreach($ringtones as $ringtone)
            <div class="card mt-3">
                <div class="card-header">{{$ringtone->title }}</div>

                <div class="card-body">
                    <audio controls onplay="pauseOthers(this);" controlsList="nodownload">
                        <source src="/audio/{{$ringtone->file}}" type="audio/ogg">
                    </audio>
                </div>

                <div class="card-footer">
                   <a href="{{route('ringtones.show',[$ringtone->id,$ringtone->slug])}}">Info and Download</a>
                </div>

            </div>
            @endforeach
            @else
            <p>There is no any audios for this category</p>
            @endif
        </div>
        <div class="col-md-4">
            <div class="card-header bg-dark text-primary">Groups</div>
             @foreach(App\Models\Category::all() as $category)
                <div class="card-header" style="background-color:#ccc;"> <a href="{{route('ringtones.category',[$category->id])}}">{{$category->name}}</a></div>
             @endforeach
        </div>

    </div>
    {{$ringtones->links()}}
</div>
@endsection
