<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get("/hello", function () {

    return "hello";
});

use App\Http\Controllers\Api\StudentController;

Route::apiResource("/student", StudentController::class);

####### Authenticate APIs
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
//        throw ValidationException::withMessages([
//            'email' => ['The provided credentials are incorrect.'],
//        ]);
        return response()->json(['message' => 'Invalid Credentials'], 422);
    }
    # limit creation no of token
    if($user->tokens()->count() < 3) {
        return $user->createToken($request->device_name)->plainTextToken;
    }
    return response()->json(['message' => 'Maximum accounts reached please logout from one of them'], 422);
});

# if user exists and username, password correct ---> return with 1|hd6d6qPfyln5oTjFb05Kys0bA1jTHsYKoX1l9XIh7620e437

# you must send token with the request header ---> need login
# store ---> need auth


Route::post("/sanctum/logout", function () {
    $user =Auth::user();
    # remove all tokens
    $user->tokens()->delete();

    # remove current tokrn
//    $user->currentAccessToken()->delete();

    return response()->json(['message' => 'Logged out successfully'], 200);

})->middleware('auth:sanctum');












