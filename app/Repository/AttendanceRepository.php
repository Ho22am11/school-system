<?php

namespace App\Repository ;

use App\Models\Attendance;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Student;
use App\Models\Teacher;

class AttendanceRepository implements AttendanceRepositoryInterface{
    
    public function index()
    {
        $grades = Grade::all();
        $sections = Section::all();
        $teachers = Teacher::all();
        return view('pages.attendances.section' , compact('sections' , 'teachers' , 'grades'));
    }

    public function create()
    {
        //
    }

    public function store($request)
    {
        $data_day = date('Y-m-d');
        foreach ($request->attendences as $studentid => $attendence) {
            if($attendence == 'presence'){
                $attendence_status = true ;
            }else if( $attendence == 'absent'){
                $attendence_status = false ;

            }

            Attendance::create([
                'date' => $data_day ,
                'attendances_student' => $attendence_status ,
                'student_id' => $studentid ,
                'Grade_id' => $request->Grade_id,
                'classroom_id' => $request->classroom_id,
                'section_id' => $request->section_id,

            ]);

            
            
        }

        return back();
    }

    public function show($id)
    {
        $students = Student::with('Attendance')->where('section_id' , $id)->get();
        return view('pages.attendances.index' , compact('students'));

    }

    public function edit($attendance)
    {
        //
    }

    public function update($attendance)
    {
        //
    }

    public function destroy( $attendance)
    {
        //
    }
}