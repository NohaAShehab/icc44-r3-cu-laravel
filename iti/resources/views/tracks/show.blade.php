@extends('layouts.app')


@section('content')

    <div class="card" style="width: 18rem;">
        <img src="" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{$track->name}}</h5>
            <h5> Description: {{$track->description}}</h5>
            <a href="{{route("tracks.index")}}" class="btn btn-primary">Back to all tracks </a>
        </div>
    </div>
@endsection
