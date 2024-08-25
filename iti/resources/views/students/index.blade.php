@extends('layouts.app')

@section('content')
    <h1> All Students </h1>
    <table class="table">

        <tr><th> ID</th> <th> Name</th> <th> Image</th> <th>Show</th> <th>Delete</th></tr>
        @foreach($students as $student)
            <tr>
                <td>{{$student->id}}</td>
                <td>{{$student->name}}</td>
                <td><img src="{{asset('images/students/'.$student->image)}}" width="100" height="100"></td>
                <td><a href="{{route("students.show", $student->id)}}" class="btn btn-info">Show</a></td>
                <td><a href="{{route("students.destroy", $student->id)}}" class="btn btn-danger">Delete</a></td>

            </tr>

        @endforeach
    </table>

@endsection
