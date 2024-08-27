@extends("layouts.app")

@section("content")

    <h1 style="text-align: center"> Edit new Student</h1>
    <form action="{{route("students.update", $student)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3">
            <label  class="form-label">Name</label>
            <input type="text" value="{{ $student->name}}"  name="name" class="form-control" >
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" value="{{$student->email}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Grade</label>
            <input type="number" value="{{$student->grade}}" name="grade" class="form-control" id="exampleInputPassword1">
            @error('grade')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label  class="form-label">Image</label>
            <input type="file" name="image" class="form-control"  >
            <img src="{{asset("images/students/{$student->image}")}}" width="50" height="50">
        </div>
        <div class="mb-3">
            <label  class="form-label">Track</label>
            <select name="track_id" class="form-control"  >
                <option disabled selected>Please select track </option>
                @foreach($tracks as $track)

                    @if($student->track_id=== $track->id)
                        <option value="{{$track->id}}" selected>{{$track->name}}</option>
                    @else
                    <option value="{{$track->id}}">{{$track->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label  class="form-label">Gender</label>

            <div class="form-check">
                <input name="gender"  value="male" class="form-check-input"
                       type="radio" id="flexRadioDefault1"  {{$student->gender ==='male' ? "checked" : ''}}>
                <label class="form-check-label" for="flexRadioDefault1" >
                    Male
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender"
                       value="female"
                    {{$student->gender ==='female' ? "checked" : ''}}>

                <label class="form-check-label" for="flexRadioDefault2">
                   Female
                </label>
            </div>

        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
