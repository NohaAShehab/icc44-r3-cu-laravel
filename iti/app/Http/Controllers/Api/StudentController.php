<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Rules\ValidStudentName;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Student::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // return to form --> dispaly errors in ??
        # validate request --> return --> error message ?
        # create new validator object
        $std_validation = Validator::make($request->all(), [
            "name"=>[
                "required",
                new ValidStudentName(),
            ],
            "email"=>"required|email|unique:students",
            "grade"=>"integer",
            "image"=>"image|mimes:jpeg,jpg,png|max:2048",
        ]);
        # if failed ? --> return response contain error message
        if($std_validation->fails()){
            return response()->json(
                [
                    "message"=>"errors with request params",
                    "errors"=> $std_validation->errors()
                    ]
                , 422);
        }


        $image_path=null;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_path=$image->store("images", 'students_images');
        }
        $request_data= request()->all();
        $request_data['image']=$image_path; # replace image object with image_uploaded path
        $student = Student::create($request_data);
        return $student;
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
        return $student;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
//        return $request->all();

//        return "hi from update";
        $std_validation = Validator::make($request->all(), [
            "name"=>[
                "required",
                new ValidStudentName(),
            ],
            "email"=>[
                "required",
                "email",
                Rule::unique("students",'email')->ignore($student)
            ],
            "grade"=>"integer",
            "image"=>"nullable|image|mimes:jpeg,jpg,png|max:2048",
        ]);
        # if failed ? --> return response contain error message
        if($std_validation->fails()){
            return response()->json(
                [
                    "message"=>"errors with request params",
                    "errors"=> $std_validation->errors()
                ]
                , 422);
        }

        $image_path=$student->image;
        if($request->hasFile('image')){
            Storage::disk('students_images')->delete($image_path);
            $image = $request->file('image');
            $image_path=$image->store("images", 'students_images');
        }
        $request_data= request()->all();
        $request_data['image']=$image_path; # replace image object with image_uploaded path
        $student->update($request_data);
        return $student;



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
        if($student->image){
        Storage::disk('students_images')->delete($student->image);

    }

        $student->delete();
        return response()->json(
            ["deleted"=>"success"], 204
        );
    }
}
