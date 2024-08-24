<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">ITI Project</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route("persons.index")}}">Persons</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>


            </ul>

        </div>
    </div>
</nav>
<h1> This is my landing page </h1>
{{--<h1> {{$name}}</h1>--}}

{{--  @dump($persons) --}}
<div class="container">
<table class="table">

    <tr><th> ID</th> <th> Name</th> <th> Image</th> <th>Show</th></tr>
    @foreach($persons as $person)
        <tr>
            <td>{{$person['id']}}</td>
            <td>{{$person['name']}}</td>
            <td>{{$person['image']}}</td>
{{--            <td><a href="/persons/{{$person['id']}}" class="btn btn-info">Show</a></td>--}}
            <td><a href="{{route("persons.show", $person['id'])}}" class="btn btn-info">Show</a></td>

        </tr>

    @endforeach
</table>

    @for($i=0; $i<5; $i++)
        @if($i==2)
            <li style="color: red"> {{$i}}</li>
        @else
            <li> {{$i}}</li>
        @endif
    @endfor

</div>




</table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
