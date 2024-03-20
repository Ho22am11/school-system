<?php

namespace App\Repository ;

use App\Models\Fee;
use App\Models\Grade;

class FeeRepository implements FeeRepositoryInterface{

    public function index(){
        $fees = Fee::all();
        return view('pages.accounts.index' , compact('fees'));
    }

    public function create(){
        $Grades = Grade::all();
        return view('pages.accounts.add' , compact('Grades'));
    }

    public function store($request){
        Fee::create([
            'name' => [ 'en' => $request->Name_en , 'ar' => $request->Name] ,
            'semester' => $request->semester ,
            'academic_year' => $request->academic_year ,
            'amount' => $request->amount,
            'Grade_id' => $request->grade_id ,
            'classroom_id' => $request->classrooms,
            'section_id' => $request->sections ,
            'type' => $request->type ,
            
        ]);

        return back();
    }

    public function edit($id){

        $fee = Fee::findOrFail($id);
        $Grades = Grade::all();
        return view('pages.accounts.edit' , compact('Grades' , 'fee'));
    }

    public function upadate($request){

        $fee = Fee::findOrFail($request->id);
        $fee->name = [ 'ar' => $request->Name , 'en' => $request->Name_en ] ;
        $fee->semester = $request->semester;
        $fee->academic_year = $request->academic_year ;
        $fee->amount = $request->amount ;
        $fee->Grade_id = $request->grade_id ;
        $fee->classroom_id = $request->classrooms ;
        $fee->section_id = $request->sections;
        $fee->type = $request->type;
        $fee->save();

        return back();
    }

    public function delete($request){
    
        Fee::destroy($request->id);
        return back();
    }


}