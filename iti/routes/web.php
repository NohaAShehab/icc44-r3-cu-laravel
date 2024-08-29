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
//
//Route::get("/persons", function () {
//   $persons = [
//       ["id"=>1, "name"=>"Omar", "image"=>"pic1.png", "salary"=>10000],
//       ["id"=>2, "name"=>"Tarek", "image"=>"pic2.png", "salary"=>20000],
//       ["id"=>3, "name"=>"Ahmed", "image"=>"pic3.png", "salary"=>30000],
//       ["id"=>4, "name"=>"Noha", "image"=>"pic4.png", "salary"=>40000],
//   ];
//   return $persons;  # Array of json --> serialization
//});

# routes with required params
//Route::get("/persons/{id}", function (int $id) {
//
////    return "found {$id}" ;
//    $persons = [
//        ["id"=>1, "name"=>"Omar", "image"=>"pic1.png", "salary"=>10000],
//        ["id"=>2, "name"=>"Tarek", "image"=>"pic2.png", "salary"=>20000],
//        ["id"=>3, "name"=>"Ahmed", "image"=>"pic3.png", "salary"=>30000],
//        ["id"=>4, "name"=>"Noha", "image"=>"pic4.png", "salary"=>40000],
//    ];
//
//    $student = array_filter($persons, function($person) use($id) {
//       return $person["id"] == $id;
//    });  # filter returns with array with the filtered objects
//
//    if($student) {
//        return $student;
//    }
//    return  "<h1 style='color: red'>No such student </h1>";
//
//
//})->name("persons.show")->where('id', '[0-9]+');  # restrict id --> only numbers


### route with optional param
Route::get("/name/{name?}", function (string $name = "name") {
    return "<h1>{$name}</h1>";
});

### route 00>  return with view ??
Route::get('/home', function () {
    return view('home');
    # view()--> access on directory /resources/views --> welcome
});

Route::get("/landing", function(){
    $persons = [
        ["id"=>1, "name"=>"Omar", "image"=>"pic1.png", "salary"=>10000],
        ["id"=>2, "name"=>"Tarek", "image"=>"pic2.png", "salary"=>20000],
        ["id"=>3, "name"=>"Ahmed", "image"=>"pic3.png", "salary"=>30000],
        ["id"=>4, "name"=>"Noha", "image"=>"pic4.png", "salary"=>40000],
    ];
    return view("landing", ["persons"=>$persons]);
});

Route::get("/persons", function (){
    $persons = [
        ["id"=>1, "name"=>"Omar", "image"=>"pic1.png", "salary"=>10000],
        ["id"=>2, "name"=>"Tarek", "image"=>"pic2.png", "salary"=>20000],
        ["id"=>3, "name"=>"Ahmed", "image"=>"pic3.png", "salary"=>30000],
        ["id"=>4, "name"=>"Noha", "image"=>"pic4.png", "salary"=>40000],
    ];
//   return view("template", ["name"=>"Ahmed", "persons"=>$persons]);
    return view("persons.index", ["persons"=>$persons]);
})->name("persons.index");


Route::get("/persons/{id}", function (int $id) {

    $persons = [
        ["id"=>1, "name"=>"Omar", "image"=>"pic1.png", "salary"=>10000],
        ["id"=>2, "name"=>"Tarek", "image"=>"pic2.png", "salary"=>20000],
        ["id"=>3, "name"=>"Ahmed", "image"=>"pic3.png", "salary"=>30000],
        ["id"=>4, "name"=>"Noha", "image"=>"pic4.png", "salary"=>40000],
    ];

    $person = array_filter($persons, function($person) use($id) {
        return $person["id"] == $id;
    });  # filter returns with array with the filtered objects

    if($person) {
        return view("persons.show", ["person"=>current($person)]);
    }
    return  "<h1 style='color: red'>No such student </h1>";

})->name("persons.show")->where('id', '[0-9]+');  # restrict id --> only numbers



#########################################################3
# get index function from StudentController ??
# in laravel no need to use require
use App\Http\Controllers\OldStudentController;
# StudentController::class  --> scope binding
//Route::get("/students",[OldStudentController::class, "index"] )->name("students.index");
//Route::get("/students/create", [OldStudentController::class, 'create'])->name("students.create");
//
//Route::get("/students/{id}",[OldStudentController::class, "show"] )->name("students.show")
//    ->where('id', '[0-9]+');
//
//Route::get("/students/{id}/destroy",
//    [OldStudentController::class, "destroy"] )->name("students.destroy")
//    ->where('id', '[0-9]+');
//
//
//### create new object
//# http request method --> post
//Route::post("/students", [OldStudentController::class, 'store'])->name("students.store");


 ##### generate routes from resource controller

use App\Http\Controllers\StudentController;

//Route::resource('students', StudentController::class)->middleware("auth");
Route::resource('students', StudentController::class);


use App\Http\Controllers\TrackController;
Route::resource("tracks", TrackController::class);







Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*
 * GET|HEAD        login ................................ login › Auth\LoginController@showLoginForm
  POST            login .................................. Auth\LoginController@login
  POST            logout ..........    ................... logout › Auth\LoginController@logout
////******************* password
 *
 * GET|HEAD        password/confirm ...... password.confirm › Auth\ConfirmPasswordController@showConfirmForm
  POST            password/confirm........... Auth\ConfirmPasswordController@confirm
  POST            password/email ..... password.email › Auth\ForgotPasswordController@sendResetLinkEmail
  GET|HEAD        password/reset ........... password.request › Auth\ForgotPasswordController@showLinkRequestForm
  POST            password/reset ............ password.update › Auth\ResetPasswordController@reset
  GET|HEAD        password/reset/{token} ....... password.reset › Auth\ResetPasswordController@showResetForm

 * GET|HEAD        register .............................. register › Auth\RegisterController@showRegistrationForm
  POST            register ............................ Auth\RegisterController@register
 *
 *
 *   GET|HEAD        home .............................................................. home › HomeController@index

 * **/


/////// Login with github
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


Route::get('/auth/redirect', function () {
//    return "github";
    return Socialite::driver('github')->redirect();
})->name('github.login');

Route::get('/auth/callback', function () {

//    return "redirected";
//    $user = Socialite::driver('github')->stateless()->user();
//    dd($user);
    // if user exists --> login .. if not register then login
    $githubUser = Socialite::driver('github')->user();
    $user = User::updateOrCreate([
        'github_id' => $githubUser->id,
    ], [
        'name' => $githubUser->name,
        'email' => $githubUser->email,
        'password'=>$githubUser->token,
        'github_token' => $githubUser->token,
        'image'=>$githubUser->getAvatar(),
        'github_refresh_token' => $githubUser->refreshToken,
    ]);

    Auth::login($user);

    return redirect('/home');

});




















