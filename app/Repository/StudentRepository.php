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
use Illuminate\Support\Facades\DB;
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


        DB::beginTransaction();
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
        $students->academic_year = $request->academic_year;
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

        DB::commit();
        return back();
    }

    public function viewstud($id){
        $Student = Student::findOrfail($id);
        return view('student.student' , compact('Student'));
    }

    public function ShowStudent(){
        $students = Student::all();
        return view('student.students' , compact('students'));
    }

    public function UploadAttachment($request){

        DB::beginTransaction();

        foreach($request->file('photos') as $file){
        $file->StoreAs('attachments/students/'.$request->student_name , $file->getClientOriginalName() ,'upload_attachments');

        $name = $file->getClientOriginalName();
        $images = new image();
        $images->filename = $name ;
        $images->imageable_id = $request->student_id ;
        $images->imageable_type = 'App\Models\Student' ;
        $images->save();

        }
        DB::commit();
        return back();
    }

    public function DownloadAttachment($filename , $studentname){
          return response()->download(public_path('attachments/students'.'pop'.'/'.$filename));
    }
}