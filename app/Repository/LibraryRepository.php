<?php

namespace App\Repository ;

use App\Models\Grade;
use App\Models\image;
use App\Models\Library;
use App\Models\Student;
use Illuminate\Support\Facades\Storage;
use App\Models\Teacher;

class LibraryRepository implements LibraryRepositoryInterface{
    public function index(){
        $books = Library::all();
        return view('pages.library.index' , compact('books'));

    }

    public function create(){
        $grades = Grade::all();
        $teachers = Teacher::all();

        return view('pages.library.create' , compact('grades' , 'teachers'));
    }

    public function store($request){

        if ($request->hasFile('photos')) {
            $file = $request->file('photos');
            $name_file = $file->getClientOriginalName();
            $file->storeAs('attachments/students/' . $request->name, $name_file, 'upload_attachments');
            // File uploaded successfully, continue processing
        } else {
            // No file uploaded, handle error or skip processing
            // For example:
            return redirect()->back()->with('error', 'No file uploaded.');
        }


    }

 
}
