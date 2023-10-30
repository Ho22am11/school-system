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
        return view('grade.index');
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
    public function store(StoreGradeRequest $request)
    {
        $validated = $request->validated();
        
        Grade::create([
            'name' => $request->grade_name,

        ]);
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
    public function update(Request $request, Grade $grade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grade $grade)
    {
        //
    }
}
