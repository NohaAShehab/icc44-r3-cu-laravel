<?php

namespace App\Http\Controllers;

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
//        $students = Student::all();
        $students= Student::paginate(4);
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        # apply validation
//        dd($request->all());
        $request->validate([
            "name"=>"required",
            "email"=>"required|email|unique:students",
            "grade"=>"integer"
        ], [
            "name.required"=>"No student without name",
            "email.required"=>"No student without email",
            "email.email"=>"Invalid email for this student",
            "email.unique"=>"Student with this email already exists",
            "grade.integer"=>"Invalid grade",
        ]);

        ### save object
        # mass assignment

        $student = Student::create($request->all());
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
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
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
        dd($student);
    }
}
