<?php

namespace App\Repository;

use App\Models\Gender;
use App\Models\Grade;
use App\Models\My_Parent;
use App\Models\Nationalitie;
use App\Models\Religion;
use App\Models\Section;
use App\Models\Teacher;

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
}