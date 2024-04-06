<?php

namespace App\Repository ;

use App\Models\Grade;
use App\Models\Quizze;
use App\Models\Subject;
use App\Models\Teacher;
use Mockery\Matcher\Subset;

class QuizzeRepository implements QuizzeRepositoryInterface{

    public function index(){
        $quizzes = Quizze::all();
        return view('pages.quizze.index' , compact('quizzes'));
    }

    public function create(){
        $data['subjects'] = Subject::all();
        $data['grades'] = Grade::all();
        $data['teachers'] = Teacher::all();
        return view('pages.quizze.create' , $data);
    }

    public function show($id){

    }

    public function store($request){
        Quizze::create([
            'name' => [ 'en' => $request->name_en , 'ar' => $request->name] ,
            'subject_id' => $request->subject_id,
            'teacher_id' => $request->teacher_id ,
            'grade_id' => $request->grade_id ,
            'classroom_id' => $request->classrooms ,
            'section_id' => $request->section_id ,
        ]);

        return redirect()->route('quizzes.index');
    }

}