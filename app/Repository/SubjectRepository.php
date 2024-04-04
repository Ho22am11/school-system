<?php 

namespace App\Repository ;

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\Teacher;

class SubjectRepository implements SubjectRepositoryInterface{
    public function index(){
        $subjects = Subject::all();
        return view('pages.subject.index' , compact('subjects'));
    }

    public function create(){
        $grades = Grade::all();
        $classrooms = Classroom::all();
        $teachers = Teacher::all();
        
        return view('pages.subject.create' , compact('grades', 'classrooms' , 'teachers'));
    }

    public function store($request){
        Subject::create([
            'name' => [ 'ar' => $request->name , 'en' => $request->name_en ],
            'Grade_id' => $request->grade_id,
            'Classroom_id' => $request->classrooms,
            'teacher_id' => $request->teacher_id,
        ]);

        return back();
    }
}