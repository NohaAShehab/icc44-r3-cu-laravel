<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller
{

    function __construct()
    {
//        $this->middleware("auth")->only("store");
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
//        $students = Student::all();
        $students= Student::paginate(4);
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tracks = Track::all();
        //
        return view('students.create',compact('tracks'));
    }

    /**
     * Store a newly created resource in storage.
     */
//    public function store(Request $request)
//    {
//        //
//        # apply validation
////        dd($request->all());
//        $request->validate([
//            "name"=>"required",
//            "email"=>"required|email|unique:students",
//            "grade"=>"integer"
//        ], [
//            "name.required"=>"No student without name",
//            "email.required"=>"No student without email",
//            "email.email"=>"Invalid email for this student",
//            "email.unique"=>"Student with this email already exists",
//            "grade.integer"=>"Invalid grade",
//        ]);
//        # save image  --> inside public path
//        # define path for the student
//        $image_path= null;
//        if($request->hasFile('image')){
//            $image = $request->file('image');
//            $image_path=$image->store("images", 'students_images');
//
//        }
//        $request_data= request()->all();
////        dd($request_data);
//        $request_data['image']=$image_path; # replace image object with image_uploaded path
//        ### save object
//        # mass assignment
//
//        $student = Student::create($request_data);
//        return to_route('students.show', $student);
//
//
//    }
    public function store(StoreStudentRequest $request)
    {
//        dd($_POST, $request->all());
//        dd($request);
        $image_path=null;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_path=$image->store("images", 'students_images');
        }
        $request_data= request()->all();
        $request_data['image']=$image_path; # replace image object with image_uploaded path
        $student = Student::create($request_data);
        return to_route('students.show', $student);
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
//        $student = Student::findorfail($student->id);
//        dd($student);
        # track_anme
//        $track = Track::find($student->track_id);

//        $all_students = Student::all()->where('track_id', $student->track_id);
//        dd($all_students);
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
        $tracks = Track::all();
        return view("students.edit", compact('student', 'tracks'));
    }

    /**
     * Update the specified resource in storage.
     */
//    public function update(Request $request, Student $student)
//    {
//        //
//        # ignore current object email
////        dd($request->all());
//        $request->validate([
//            "name"=>"required",
////            "email"=>"required|email|unique:students",
//            "email"=>[
//                "required",
//                "email",
//                Rule::unique("students",'email')->ignore($student)
//            ],
//            "grade"=>"integer"
//        ], [
//            "name.required"=>"No student without name",
//            "email.required"=>"No student without email",
//            "email.email"=>"Invalid email for this student",
//            "email.unique"=>"Student with this email already exists",
//            "grade.integer"=>"Invalid grade",
//        ]);
//
//        $image_path= $student->image;
//        if($request->hasFile('image')){
//            $image = $request->file('image');
//            $image_path=$image->store("images", 'students_images');
//
//        }
//        $request_data= request()->all();
//        $request_data['image']=$image_path;
//        $student->update($request_data);
//        return to_route('students.show', $student);
//    }

    public function update(UpdateStudentRequest $request, Student $student)
    {
        $image_path= $student->image;
        if($request->hasFile('image')){
            # delete old_image
            $image = $request->file('image');
            $image_path=$image->store("images", 'students_images');

        }
        $request_data= request()->all();
        $request_data['image']=$image_path;
        $student->update($request_data);
        return to_route('students.show', $student);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return to_route('students.index')->with('success', 'Student deleted successfully');
    }
}
