<?php

namespace App\Http\Controllers\Grade;
use App\Models\Grade;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGradeRequest;
use Illuminate\Http\Request;


class GradeController extends Controller
{
    public function index()
    {
        $grades = Grade::all();
        return view('grade.index',compact('grades'));
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
       
   
        $Grade = new Grade();
        $Grade->name =['en' => $request->grade_name_en , 'ar' => $request->grade_name];
        $Grade->save();
        session()->flash('Add', trans('message.secces_grade'));
        return back();

    }

    /**
     * Display the specified resource.
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grade $grade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
    
        try {
            $grade = Grade::findOrFail($request->id);
         $grade->update([
            $grade->name = ['ar' => $request->grade_name , 'en' => $request->grade_name_en ]
         ]);
         session()->flash('Add',trans('message.secces_edit'));
         return back();


        }
        catch
        (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
        

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grade $grade)
    {
        //
    }
}
