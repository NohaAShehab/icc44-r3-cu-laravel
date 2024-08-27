@extends("layouts.app")

@section("content")

    <h1 style="text-align: center"> Add new Student</h1>
    <form action="{{route("students.store")}}" method="post">
        @csrf

        <div class="mb-3">
            <label  class="form-label">Name</label>
            <input type="text" value="{{old('name')}}"  name="name" class="form-control" >
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" value="{{old("email")}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Grade</label>
            <input type="number" value="{{old("grade")}}" name="grade" class="form-control" id="exampleInputPassword1">
            @error('grade')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label  class="form-label">Image</label>
            <input type="text" name="image" class="form-control"  >
        </div>
        <div class="mb-3">
            <label  class="form-label">Gender</label>

            <div class="form-check">
                <input name="gender"  value="male" class="form-check-input"
                       type="radio" id="flexRadioDefault1"  {{old("gender")==='male' ? "checked" : ''}}>
                <label class="form-check-label" for="flexRadioDefault1" >
                    Male
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender"
                       value="female"
                    {{old("gender")==='female' ? "checked" : ''}}>

                <label class="form-check-label" for="flexRadioDefault2">
                   Female
                </label>
            </div>

        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
