@extends('layouts.app')

@section('title')
    Persons
@endsection
@section('content')
    <h1> Hii</h1>
    <table class="table">

        <tr><th> ID</th> <th> Name</th> <th> Image</th> <th>Show</th></tr>
        @foreach($persons as $person)
            <tr>
                <td>{{$person['id']}}</td>
                <td>{{$person['name']}}</td>
                <td>{{$person['image']}}</td>
                <td><a href="{{route("persons.show", $person['id'])}}" class="btn btn-info">Show</a></td>

            </tr>

        @endforeach
    </table>

@endsection
