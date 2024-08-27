@extends('layouts.app')

@section('content')
    @if(session('success'))
        <div class="alert alert-success">{{session("success")}} </div>
    @endif
    <a class="btn btn-primary" href="{{route("students.create")}}"> Create new Student </a>
    <h1> All Students </h1>
    <table class="table">

        <tr><th> ID</th> <th> Name</th> <th> Image</th> <th>Show</th> <th> Edit</th> <th>Delete</th></tr>
        @foreach($students as $student)
            <tr>
                <td>{{$student->id}}</td>
                <td>{{$student->name}}</td>
                <td><img src="{{asset('images/students/'.$student->image)}}" width="100" height="100"></td>
                <td><a href="{{route("students.show", $student)}}" class="btn btn-info">Show</a></td>
                <td><a href="{{route("students.edit", $student)}}" class="btn btn-warning">Edit</a></td>

                <td>

{{--                    <a href="{{route("students.destroy", $student->id)}}" class="btn btn-danger">Delete</a>--}}
                    <form action="{{route("students.destroy", $student)}}" method="post">
                        @csrf
                        @method("delete")
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </form>
                    </td>

            </tr>

        @endforeach
    </table>

    {{$students->links()}}
@endsection
