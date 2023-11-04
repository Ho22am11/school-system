<?php

namespace App\Http\Controllers\Classroom;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
  

    public function index()
    {
        $Grades = Grade::all();
        $classrooms = Classroom::all();
       return view('classroom.index', compact('classrooms' , 'Grades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       try{
        if(Classroom::where('name->ar',$request->name)->orwhere('name->en' ,$request->name_class_en )->exists()){
            return redirect()->back()->withErrors(trans('message.already_exist'));

        }

      
    
        Classroom::create([
            'name' => ['en' => $request->name_class_en , 'ar' => $request->name],
            'grade_id' => $request->Grade_id

        ]);
        session()->flash('Add', trans('message.secces_grade'));
        return back();
        return back();
       }
       catch
        (Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

     } 

     

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try{

        
        $Classroom = Classroom::findOrFail($request->id);
        $Classroom->update([

            $Classroom->name = ['en' => $request->name_en , 'ar' => $request->name],
            $Classroom->grade_id = $request->grade_id ,

        ]);
        session()->flash('Add', trans('message.secces_edit'));
        return back();
    }
    catch
    (Exception $e){
        return redirect()->back()->witherrors(['error' => $e->getMessage()]);

    }
        


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       

    }
}


