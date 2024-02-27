<?php

namespace App\Repository;

use App\Models\Gender;
use App\Models\Grade;
use App\Models\image;
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

        $students = new Student();
        $students->name =  ['en'=>$request->Name_en , 'ar' =>$request->Name ];
        $students->email =  $request->Email;
        $students->password =  Hash::make($request->Password) ;
        $students->Nationality_id =  $request->Nationality_id;
        $students->Gender_id =  $request->Gender_id;
        $students->Religion_Father_id =  $request->religion_id;
        $students->date_of_birth =  $request->date_of_birth;
        $students->grade_id =  $request->grade_id;
        $students->classroom_id =  $request->classrooms;
        $students->section_id =  $request->sections;
        $students->parent_id =  $request->parent_id;
        $students->save();
     
        if($request->hasfile('photos'))
        {
            foreach($request->file('photos') as $file){
                $name = $file->getClientOriginalName();
                $file->storeAs('attachments/students/'.$request->Name , $name , 'upload_attachments' );

                $images = new image();
                $images->filename = $name ;
                $images->imageable_id =  $students->id ;
                $images->imageable_type = 'App\Models\Student' ;
                $images->save();
                

            }
        }


        return back();
    }

    public function ShowStudent(){
        $students = Student::all();
        return view('student.students' , compact('students'));
    }
}