<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\TeacherepositoryInterface;
use App\Models\specialization;
use App\Models\Gender;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{

    public $Teacher ;
    public function __construct(TeacherepositoryInterface $Teacher)
    {
        $this->Teacher = $Teacher ;
        
    }

    public function index()
    {
        return view('teacher.teacher');
    }

    public function add_teacher(){
        $specializations = specialization::all();
        $genders = Gender::all();
        return view('teacher.add_teacher' , compact('specializations' , 'genders'));
    }

    public function store(Request $request){
       
        $teacher = new Teacher();
     
        
        $teacher->Name = [ 'ar' => $request->Name , 'en' => $request->Name_en ] ;
        $teacher->Email = $request->Email ;
        $teacher->Password = Hash::make($request->Password);
        $teacher->Specialization_id = $request->Specialization_id ;
        $teacher->Gender_id = $request->Gender_id ;
    
        $teacher->Address = $request->Address ;
        $teacher->save();

        return back();
    
    }
}
