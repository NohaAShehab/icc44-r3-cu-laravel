@extends('layouts.app')

@section('content')
    @if(session('error'))
        <div class="alert alert-danger">{{session("error")}} </div>
    @endif
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
                <td><img src="{{asset('images/students/'.$student->image)}}" width="50" height="50"></td>
                <td><a href="{{route("students.show", $student)}}" class="btn btn-info">Show</a></td>
                <td><a href="{{route("students.edit", $student)}}" class="btn btn-warning">Edit</a></td>
{{--                @auth()--}}
{{--                <td>--}}

{{--                    <form action="{{route("students.destroy", $student)}}" method="post">--}}
{{--                        @csrf--}}
{{--                        @method("delete")--}}
{{--                        <input type="submit" class="btn btn-danger" value="Delete">--}}
{{--                    </form>--}}
{{--                    </td>--}}
{{--                @else--}}
{{--                    <td><strong>Login first</strong></td>--}}
{{--                @endauth--}}
                @can('delete-student', $student)
                    <td>
                    <form action="{{route("students.destroy", $student)}}" method="post">
                        @csrf
                        @method("delete")
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </form>
                    </td>
                @else
                    <td>
                    <strong style="color:red">You cannot delete this student</strong>
                    </td>
                @endcan
            </tr>

        @endforeach
    </table>

    {{$students->links()}}
@endsection
