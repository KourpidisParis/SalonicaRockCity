@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
           @if(Session::has('message'))
               <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif
            <div class="card">
                <div class="card-header">All Tracks
                    <span class="float-right">
                        <a href="{{route('photos.create')}}">
                        <button class="btn btn-primary">Create photo</button>
                        </a>
                    </span>
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                               <th scope="col">#</th>
                               <th scope="col">File</th>
                               <th scope="col">Title</th>
                               <th scope="col">Description</th>
                               <th scope="col">Format</th>
                               <th scope="col">Size</th>
                               <th scope="colo">Edit</th>
                               <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @if(count($photos)>0)
                                @foreach($photos as $key=>$photo)
                                <th scope="row">{{$key+1}}</th>
                                <td>
                                   <img src="/uploads/{{$photo->file}}" alt="" width="100">
                                </td>
                                <td>{{$photo->title}}</td>
                                <td>{{$photo->description}}</td>
                                <td>{{$photo->format}}</td>
                                <td>{{round($photo->size)*0.001,2}} bytes</td>
                                <td>
                                <a href="{{route('photos.edit',[$photo->id])}}"><button class="btn btn-primary">Edit</button></a>
                                </td>
                                <td>
                                   <form action="{{route('photos.destroy',[$photo->id])}}" method="post" onSubmit="return confirm('Dou you want to delete?')">@csrf
                                     {{method_field('DELETE')}}
                                      <button class="btn btn-danger" type="submit" >Delete</button>
                                   </form>
                                </td>
                            </tr>
                                @endforeach
                                @else
                                <td>No photos to diaplay</td>
                                @endif
                        </tbody>
                    
                    
                    
                    </table>

                </div>
            </div>
            {{$photos->links()}}
        </div>
    </div>
</div>

@endsection
