<?php

namespace App\Repository ;

use App\Models\Question;
use App\Models\Quizze;

class QuestionRepository implements QuestionRepositoryInterface{
    public function index(){
        $questions = Question::all();
        return view('pages.question.index' , compact('questions'));
    }

    public function create(){

        $quizzes = Quizze::all();
        return view('pages.question.create' , compact('quizzes'));

    }

    public function show($id){

    }

    public function store($request){
        
        Question::create([
            'title'=> $request->name ,
            'answers'=> $request->answers ,
            'right_answers'=> $request->right_answer ,
            'score'=> $request->score ,
            'quizze_id'=> $request->quizze_id ,
        ]);

        return redirect()->route('questions.index');
    }
}