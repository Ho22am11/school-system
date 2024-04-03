<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Repository\AttendanceRepositoryInterface;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    protected $Attendance ;
    public function __construct(AttendanceRepositoryInterface $Attendance)
    {
        $this->Attendance = $Attendance ;
        
    }
    public function index()
    {
        return $this->Attendance->index();
    }

    public function store(Request $request)
    {
        return $this->Attendance->store($request);
    }

    public function show($id)
    {
        return $this->Attendance->show($id);
    }

    public function edit(Attendance $attendance)
    {
        //
    }

    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    public function destroy(Attendance $attendance)
    {
        //
    }
}
