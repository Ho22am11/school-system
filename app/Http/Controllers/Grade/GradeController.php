<?php

namespace App\Http\Controllers\Grade;
use App\Models\Grade;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGradeRequest;
use Exception;
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
       
   
        try {

        if(Grade::where('name->ar',$request->grade_name)->orwhere('name->en',$request->grade_name_en)->exists()){
            return redirect()->back()->withErrors(trans('message.already_exist'));

        }
        $Grade = new Grade();
        $Grade->name =['en' => $request->grade_name_en , 'ar' => $request->grade_name];
        $Grade->save();
        session()->flash('Add', trans('message.secces_grade'));
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
    public function destroy($id)
    {
        try {
        $grade = Grade::findOrFail($id);
        $grade->delete();
        session()->flash('Add',trans('message.secces_delete'));
        return back();
        }
        catch
        (\Exception $e){
            return redirect()->back()->withErrors(['error' => trans('message.reletion')]);
        }

    }
}
