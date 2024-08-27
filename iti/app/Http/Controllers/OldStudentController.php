<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;

class OldStudentController extends Controller
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

    function create(){
        # return new view ==> contain form
        return view("students.create");
    }

    function  store()
    {


//        dd("new object created");
//        dd($_POST);

        # create new object
//        $student = new Student();
//        $student->name = $_POST['name'];
//        $student->email= $_POST['email'];
//        $student->gender = $_POST['gender'];
//        $student->image = $_POST['image'];
//        $student->grade= $_POST['grade'];
//        $student->save(); # insert into students --->
//        return to_route("students.show", $student->id);

        ### use laravel request --> middleware convert empty strings to null
//        $request_data=request()->all();
////        dd($request_data, $_POST);
//        $student = new Student();
//        $student->name = $request_data['name'];
//        $student->email = $request_data['email'];
//        $student->grade = $request_data['grade'];
//        $student->gender  = $request_data['gender'];
//        $student->image = $request_data['image'];
//        $student->save(); # save in db --> id generated and saved to the object
//        return to_route("students.show", $student->id);

        # using laravel request --> validation on data
        # define validation rules
        $valid_data =request()->validate([
           "name"=>"required",
           "email"=>"required|email|unique:students",
            "grade"=>"integer"
        ]);

//        dd($valid_data);
        $request_data = request()->all(); # get request parameter
        # if form is not valid  --> redirect to the html page
        $student = new Student();
        $student->name = $request_data['name'];
        $student->email = $request_data['email'];
        $student->grade = $request_data['grade'];
        $student->gender  = $request_data['gender'];
        $student->image = $request_data['image'];
        $student->save();
        return to_route("students.show", $student->id);






    }




}
