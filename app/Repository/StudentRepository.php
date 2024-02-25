<?php

namespace App\Repository;

use App\Models\Gender;
use App\Models\Grade;
use App\Models\My_Parent;
use App\Models\Nationalitie;
use App\Models\Religion;
use App\Models\Section;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;

class StudentRepository implements StudentRepositoryInterface {

    public function Create_Student(){
        $data['Genders'] = Gender::all();
        $data['Parents'] = My_Parent::all();
        $data['Grades'] = Grade::all();
        $data['Nationalities'] = Nationalitie::all();
        $data['religions'] = Religion::all();
        return view('student.add_student' , $data);
    }  

    public function getsections($id){
        $sections = Section::where("classroom_id", $id)->pluck("name", "id");
        return json_encode($sections);
    }

    public function StoreStudent($request){
         Student::create([
             'name' => ['en'=>$request->Name_en , 'ar' =>$request->Name ],
             'email' => $request->Email ,
             'password' => Hash::make($request->Password),
             'Nationality_id' => $request->Nationality_id ,
             'Gender_id' => $request->Gender_id ,
             'Religion_Father_id' => $request->religion_id,
             'date_of_birth' => $request->date_of_birth ,
             'grade_id' => $request->grade_id ,
             'classroom_id' => $request->classrooms,
             'section_id' => $request->sections,
             'parent_id' => $request->parent_id,

        ]);
        return back();
    }
}