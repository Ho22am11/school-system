<?php

namespace App\Repository ;

use App\Models\Exam;
use App\Models\Subject;

class ExamRepository implements ExamRepositoryInterface{

    public function index(){
        $exams = Exam::all();
        return view('pages.exam.index' , compact('exams'));
    }

    public function create(){

        $subjects = Subject::all();
        return view('pages.exam.create' , compact('subjects'));
    }

    public function store($request){

       
       
        Exam::create([
            'name' => [ 'ar' => $request->name , 'en' => $request->name_en ],
            'subject_exam' => $request->subject_id,
            'term' => $request->term,
            'academic_year' => $request->academic_year,
        ]);

        return back(); 
    }
}
