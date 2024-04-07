<?php

namespace App\Http\Controllers\Quizze;

use App\Http\Controllers\Controller;
use App\Repository\QuestionRepositoryInterface;
use Illuminate\Http\Request;

class QuestionController extends Controller
{

    protected $Question ;
    public function __construct(QuestionRepositoryInterface $Question)
    {
        $this->Question = $Question;
    }
    public function index()
    {
        return $this->Question->index();
    }

    public function create()
    {
        return $this->Question->create();
    }

    public function store(Request $request)
    {
        return $this->Question->store($request);
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
