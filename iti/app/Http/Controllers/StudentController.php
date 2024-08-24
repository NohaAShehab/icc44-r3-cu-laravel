<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view("students.index", ["students"=>$this->students]);
    }


    function show ($id){
        $student = array_filter($this->students, function($student) use ($id){
            return $student['id'] == $id;
        });
        if($student){
            return view("students.show", ["student"=>current($student)]);
        }

        abort(404); # return with page 404 not found
    }
}
