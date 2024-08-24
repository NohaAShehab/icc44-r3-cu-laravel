<?php

# in this file you register your routes
// each route is associated with controller

use Illuminate\Support\Facades\Route;
# to define route
# Route::method (get, post)---> url ===> function  ----> controller function
Route::get('/', function () {
    return view('welcome');
});

# create my first route

Route::get("/cu", function () {
    return "CU PHP Track";
});

Route::get("/php", function () {
    return "<h1 style='color: #2ca02c; text-align: center'>CU PHP Track </h1>";
});

Route::get("/persons", function () {
   $persons = [
       ["id"=>1, "name"=>"Omar", "image"=>"pic1.png", "salary"=>10000],
       ["id"=>2, "name"=>"Tarek", "image"=>"pic2.png", "salary"=>20000],
       ["id"=>3, "name"=>"Ahmed", "image"=>"pic3.png", "salary"=>30000],
       ["id"=>4, "name"=>"Noha", "image"=>"pic4.png", "salary"=>40000],
   ];
   return $persons;  # Array of json --> serialization
});

# routes with required params
Route::get("/persons/{id}", function (int $id) {

//    return "found {$id}" ;
    $persons = [
        ["id"=>1, "name"=>"Omar", "image"=>"pic1.png", "salary"=>10000],
        ["id"=>2, "name"=>"Tarek", "image"=>"pic2.png", "salary"=>20000],
        ["id"=>3, "name"=>"Ahmed", "image"=>"pic3.png", "salary"=>30000],
        ["id"=>4, "name"=>"Noha", "image"=>"pic4.png", "salary"=>40000],
    ];

    $student = array_filter($persons, function($person) use($id) {
       return $person["id"] == $id;
    });  # filter returns with array with the filtered objects

    if($student) {
        return $student;
    }
    return  "<h1 style='color: red'>No such student </h1>";


})->where('id', '[0-9]+');  # restrict id --> only numbers


### route with optional param
Route::get("/name/{name?}", function (string $name = "name") {
    return "<h1>{$name}</h1>";
});
















