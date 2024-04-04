<?php

namespace App\Http\Controllers\Exams;

use App\Http\Controllers\Controller;
use App\Repository\ExamRepositoryInterface;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    protected $Exam ;
    public function __construct(ExamRepositoryInterface $Exam)
    {
        $this->Exam = $Exam ;
    }
    public function index()
    {
        return $this->Exam->index();

    }

    public function create()
    {
        return $this->Exam->create();
    }

    public function store(Request $request)
    {
        return $this->Exam->store($request);
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
