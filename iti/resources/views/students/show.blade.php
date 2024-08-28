@extends('layouts.app')


@section('content')
{{--    @dump($student->track)--}}
<div class="row">
    <div class="card col-3" style="width: 18rem;">
        <img src="{{asset("images/students/".$student->image)}}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{$student->name}}</h5>
            <p class="card-text">Email: {{$student->email}}</p>
            <p class="card-text">Track: {{$student->track_id}}</p>
{{--            <p class="card-text" > Track name :<a href="{{$student->track ? route("tracks.show", $student->track): ""}}">{{$student->track ? $student->track->name: "no track"}}--}}
{{--                </a></p>--}}
            @if($student->track)
                <p class="card-text" > <a href="{{route("tracks.show", $student->track)}}"> {{$student->track->name}}</a> </p>

            @endif
            <p class="card-text"><strong> Created_by: {{$student->creator ? $student->creator->name : "unknown"}} </strong></p>
            <p class="card-text">Created_at: {{$student->created_at}}</p>
            <p class="card-text">Updated_at: {{$student->updated_at}}</p>

            <a href="{{route("students.index")}}" class="btn btn-primary">Back to all students </a>
        </div>
    </div>
    <div class="col" >
        <h1>Other students in this class </h1>
{{--        @dump($student->track->students)--}}
        @if($student->track)
        @foreach($student->track->students as $std)
            @if($std->id != $student->id )
            <li> <a href="{{route("students.show", $std)}}">{{$std->name}} </a></li>
            @endif
        @endforeach
        @else
            <h3 class="text-danger"> No students in this track </h3>
        @endif
    </div>
</div>
@endsection
