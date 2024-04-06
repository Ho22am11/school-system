<?php

namespace App\Http\Controllers\Quizze;

use App\Http\Controllers\Controller;
use App\Repository\QuizzeRepositoryInterface;
use Illuminate\Http\Request;

class QuizzeController extends Controller
{
    protected $Quizze ;
    public function __construct(QuizzeRepositoryInterface $Quizze)
    {
        $this->Quizze = $Quizze ;
    }

    public function index()
    {
        return $this->Quizze->index();
    }

    public function create()
    {
        return $this->Quizze->create();
    }

    public function store(Request $request)
    {
        return $this->Quizze->store($request);
    }

    public function show($id)
    {
        return $this->Quizze->show($id);

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
