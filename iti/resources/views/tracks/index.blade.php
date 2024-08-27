@extends('layouts.app')

@section('content')
    <a class="btn btn-primary" href="{{route("tracks.create")}}"> Create new track </a>
    <h1> All tracks </h1>
    <table class="table">

        <tr><th> ID</th> <th> Name</th>  <th>Show</th> <th>Delete</th></tr>
        @foreach($tracks as $track)
            <tr>
                <td>{{$track->id}}</td>
                <td>{{$track->name}}</td>
                <td><a href="{{route("tracks.show", $track)}}" class="btn btn-info">Show</a></td>
                <td><a href="{{route("tracks.destroy", $track->id)}}" class="btn btn-danger">Delete</a></td>

            </tr>

        @endforeach
    </table>

    {{$tracks->links()}}
@endsection
