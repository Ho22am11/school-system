<?php

namespace App\Http\Controllers\Section;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Teacher;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /* example of relation many to many
         * we have already relation between sections and teachers
         * if we went know sections related teacher
         * you give me id of the teacher
         * ----------
         * $teachers = Teacher::findOrFail($id);
         * return $teachers->sections;  // sections her is relationship we make it in model Teacher
         * -------
         * and if we went know who is teachers of section
         * -------
         * $sections = Section::findOrFail($id);
         * return $sections->teachers;

        */
        $grades = Grade::all();
        $sections = Section::all();
        $teachers = Teacher::all();
        $classrooms = Classroom::all();
        return view('section.section', compact('grades' , 'classrooms', 'sections' , 'teachers'));
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
            $sections = new Section();
            $sections->name =['en'=>$request->name_en , 'ar' => $request->name];
            $sections->grade_id =$request->grade_id;
            $sections->classroom_id =$request->classrooms;
            $sections->status = 1;
            $sections->save();
            $sections->teachers()->attach($request->teacher_id);

            session()->flash('Add',trans('message.secces_grade'));
            return back();

        }
        catch
        (\Exception $e){

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function getclassroom($id)
    {
        $classrooms = Classroom::where("grade_id", $id)->pluck("name", "id");
        return json_encode($classrooms);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id =  $request->id;
        $section = Section::findOrFail($id);
        $section->update([
            $section->name = ['en' => $request->name_en , 'ar' => $request->name],
            $section->grade_id = $request->grade_id,
            $section->classroom_id = $request->classrooms,


        ]);
        session()->flash('Add',trans('message.secces_edit'));
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id =  $request->id;
        $section = Section::findOrFail($id);
        $section->delete();
        session()->flash('Add',trans('message.secces_delete'));
        return back();

    }
}
