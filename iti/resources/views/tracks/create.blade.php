@extends("layouts.app")

@section("content")

    <h1 style="text-align: center"> Add new Track</h1>
    <form action="{{route("tracks.store")}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label  class="form-label">Name</label>
            <input type="text" value="{{old('name')}}"  name="name" class="form-control" >
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-3">
            <label  class="form-label">Description</label>
            <input type="text" name="description" class="form-control"  >
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
