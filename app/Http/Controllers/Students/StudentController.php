<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\Student;
use App\Repository\StudentRepositoryInterface;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $Student ;
    public function __construct(StudentRepositoryInterface $Student)
    {
        $this->Student = $Student ;
        
    }
    
    public function index()
    {
       return $this->Student->ShowStudent();
    }
 
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->Student->Create_Student();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->Student->StoreStudent($request);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
       return $this->Student->viewstud($id);
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
    public function Download($filename , $studentname)
    {
        return $this->Student->DownloadAttachment($filename , $studentname);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    
    public function getsection($id)
    {
        return $this->Student->getsections($id);
    }

    public function upload_attachment(Request $request)
    {
        return $this->Student->UploadAttachment($request);
    }

    

}
