<?php

namespace App\Http\Controllers\Section;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
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
        $grades = Grade::all();
        $sections = Section::all();
        return view('section.section', compact('grades' , 'sections'));
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
            Section::create([
                'name' => ['en'=>$request->name_en , 'ar' => $request->name],
                'grade_id' => $request->grade_id ,
                'classroom_id' => $request->classrooms,
                'status' => 1 ,

            ]);
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
