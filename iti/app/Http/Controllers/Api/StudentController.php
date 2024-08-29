<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //


        $student->delete();
        return "deleted";
    }
}
