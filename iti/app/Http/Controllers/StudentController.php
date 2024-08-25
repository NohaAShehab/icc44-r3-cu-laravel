<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;

class StudentController extends Controller
{
    private $students=  [
        ["id"=>1, "name"=>"Omar", "image"=>"pic1.png", "salary"=>10000],
        ["id"=>2, "name"=>"Tarek", "image"=>"pic2.png", "salary"=>20000],
        ["id"=>3, "name"=>"Ahmed", "image"=>"pic3.png", "salary"=>30000],
        ["id"=>4, "name"=>"Noha", "image"=>"pic4.png", "salary"=>40000],

        ];
    // contains functions --> manage actions
    function index (){
//        return "students";
        # get data from database
         # 1- query
        # select * from students;
//        $students = DB::table('students')->get();
        ### 2- Model
        // select * from students;
//        $students= Student::all(['id', 'name', 'image']);
        $students=Student::all();
//        dd($students); # dump then exit
//        return $students;


        return view("students.index", ["students"=>$students]);

    }


    function show ($id){
        # select * from students where id=id;
        $student= Student::find($id);
//        dd($student);
        if($student){
            return view("students.show", ["student"=>$student]);
        }

        abort(404); # return with page 404 not found
    }

    function destroy ($id){
        $student = Student::find($id);
        if($student){
            $student->delete();  # delete from students where id=id;
            return to_route("students.index");
        }
        abort(404);
    }




}
