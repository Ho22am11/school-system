<?php

namespace App\Http\Controllers\Subject;

use App\Http\Controllers\Controller;
use App\Repository\SubjectRepositoryInterface;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
   protected $Subject ;
   public function __construct(SubjectRepositoryInterface $Subject)
   {
       $this->Subject = $Subject ;
   }
    public function index()
    {
        return $this->Subject->index();
    }

    public function create()
    {
        return $this->Subject->create();
    }

    public function store(Request $request)
    {
        return $this->Subject->store($request);
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
