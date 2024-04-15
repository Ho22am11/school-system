<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Http\Controllers\traits\ZoomMeetingTrait;
use App\Models\Grade;
use App\Models\OnlineClass;
use App\Models\Subject;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MacsiDigital\Zoom\Facades\Zoom;

class OnlineClassesController extends Controller
{

    use ZoomMeetingTrait ;

    public function index()
    {
        $online_classes = OnlineClass::all();
        return view('pages.onlineclasses.index' , compact('online_classes'));
    }

    public function create()
    {
        $data['grades'] = Grade::all();
        $data['teachers'] = Teacher::all();
        $data ['subjects'] = Subject::all();
        return view('pages.onlineclasses.add' , $data);

    }


    public function store(Request $request)
    {
        $meeting = $this->createMeeting($request);

        OnlineClass::create([
            'Grade_id' => $request->grade_id ,
            'Classroom_id' => $request->classrooms ,
            'section_id' => $request->section_id ,
            'user_id' => auth()->user()->id ,
            'subject_id' => $request->subject_id ,
            'meeting_id' => $meeting->id ,
            'topic' => $request->name ,
            'start_at' => $request->start_time ,
            'duration' => $meeting->duration ,
            'password' => $meeting->password ,
            'start_url' => $meeting->start_url ,
            'join_url' => $meeting->join_url ,
        ]);


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
