<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Repository\LibraryRepositoryInterface;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    protected $Libray;

    public function __construct(LibraryRepositoryInterface $Libray )
    {
        $this->Libray = $Libray ;
    }

    public function index()
    {
        return $this->Libray->index();
    }


    public function create()
    {
        return $this->Libray->create();
    }


    public function store(Request $request)
    {
        return $this->Libray->store($request);
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
