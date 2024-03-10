<?php

namespace App\Repository ;

use App\Models\Grade;
use App\Models\Promotion;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class PromotionRepository implements PromotionRepositoryInterface{
    
    public function index(){
          $grades = Grade::all();
          return view('student.promotion.index' , compact('grades'));
    }

    public function store($request){
        $students = Student::where('Gender_id',$request->Grade_id)->where('classroom_id', $request->Classroom_id)->where('section_id',$request->section_id)->where('academic_year' ,$request->academic_year )->get();
        // don't forget the get() agine please -_-


        DB::beginTransaction();
        foreach($students as $student){
            $ids = explode(',' , $student->id); // [ $id1 , $id2 , $id3] 
            Student::whereIn('id' , $ids)->update(
                [
                    'Gender_id' => $request->Grade_id_new ,
                    'classroom_id' => $request->Classroom_id_new,
                    'section_id' => $request->section_id_new,
                    'academic_year' => $request->academic_year_new ,
                ]
                );
            
            $promo = new Promotion();
            $promo->student_id = $student->id ;
            $promo->from_grade = $request->Grade_id ;
            $promo->from_classroom = $request->Classroom_id;
            $promo->from_section = $request->section_id ;
            $promo->academic_year = $request->academic_year ;
            $promo->academic_year_new = $request->academic_year_new ;

            $promo->to_grade = $request->Grade_id_new ;
            $promo->to_classroom = $request->Classroom_id_new ;
            $promo->to_section = $request->section_id_new ;

            $promo->save();



        }

        DB::commit();

        return back();
    }

    public function create(){
        $promotions = Promotion::all();
        return view('student.promotion.management' , compact('promotions'));

    }

    public function DeleteAll($request){
        DB::beginTransaction();
        if($request->page_id == 1){
           
            $promotions = Promotion::all();

            foreach($promotions as $promotion){
                $ids = explode(',' , $promotion->student_id );
                Student::whereIn('id' , $ids)->update(
                [
                    'Gender_id' => $promotion->from_grade ,
                    'classroom_id' => $promotion->from_classroom,
                    'section_id' => $promotion->from_section,
                    'academic_year' => $promotion->academic_year ,

                ]);
                Promotion::truncate();
            }
            
            
        
            return back();
        }
        
        else{

        }
        DB::commit();
    }
}