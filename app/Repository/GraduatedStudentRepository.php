<?php

namespace App\Repository ;

use App\Models\Grade;
use App\Models\Student;

class GraduatedStudentRepository implements GraduatedStudentRepositoryInterface{
    public function index(){
        $students = Student::onlyTrashed()->get();
        return view('student.graduated.index' , compact('students'));
    }

    public function create(){
        $grades = Grade::all();
        return view('student.graduated.graduated' , compact('grades'));
    }

    public function softdelete($request){
        $students = Student::where('Grade_id',$request->Grade_id)->where('classroom_id', $request->Classroom_id)->where('section_id',$request->section_id)->get();
        foreach ($students as $student){
            $ids = explode(',' ,$student->id);
            Student::whereIn('id' , $ids)->Delete();
        }

        return redirect()->route('graduated.index');
      

    }

   public function ReturnStudent($request){
        Student::onlyTrashed()->find($request->id)->restore();
        return back();

    }

    public function destroy($id){
        Student::onlyTrashed()->find($id)->forceDelete();
        return back();
    }
}
