<?php

namespace App\Http\Controllers\Fees;

use App\Http\Controllers\Controller;
use App\Models\Fee;
use App\Repository\FeeRepositoryInterface;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    protected $Fee ;
    public function __construct(FeeRepositoryInterface $Fee)
    {
        $this->Fee = $Fee ;
    }

    public function index()
    {
        return $this->Fee->index();
    }

    
    public function create()
    {
        return $this->Fee->create();
    }

  
    public function store(Request $request)
    {
        return $this->Fee->store($request) ;
    }

    public function edit($id)
    {
        return $this->Fee->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        return $this->Fee->upadate($request) ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->Fee->delete($request);
    }
}
