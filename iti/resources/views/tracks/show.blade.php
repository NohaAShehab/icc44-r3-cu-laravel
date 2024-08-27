@extends('layouts.app')


@section('content')
<div class="row ">
    <div class="card col-3" style="width: 18rem;">
        <img src="" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{$track->name}}</h5>
            <h5> Description: {{$track->description}}</h5>
            <a href="{{route("tracks.index")}}" class="btn btn-primary">Back to all tracks </a>
        </div>
    </div>
    <div class="col">
        <h1> Students in this track </h1>
        @foreach($track->students as $std)
                <li> <a href="{{route("students.show", $std)}}">{{$std->name}} </a></li>
        @endforeach
    </div>
</div>
@endsection
