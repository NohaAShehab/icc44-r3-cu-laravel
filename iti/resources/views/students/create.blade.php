@extends("layouts.app")

@section("content")

    <h1 style="text-align: center"> Add new Student</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route("students.store")}}" method="post">
        @csrf

        <div class="mb-3">
            <label  class="form-label">Name</label>
            <input type="text"  name="name" class="form-control" >
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Grade</label>
            <input type="number" name="grade" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label  class="form-label">Image</label>
            <input type="text" name="image" class="form-control"  >
        </div>
        <div class="mb-3">
            <label  class="form-label">Gender</label>
            <div class="form-check">
                <input name="gender"  value="male" class="form-check-input" type="radio" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                    Male
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" value="female" hf0id="flexRadioDefault2" checked>
                <label class="form-check-label" for="flexRadioDefault2">
                   Female
                </label>
            </div>

        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
