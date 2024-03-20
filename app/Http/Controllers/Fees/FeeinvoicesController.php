<?php

namespace App\Http\Controllers\Fees;

use App\Http\Controllers\Controller;
use App\Repository\FeeInvoicesRepositoryInterface;
use App\Repository\FeeRepositoryInterface;
use Illuminate\Http\Request;

class FeeinvoicesController extends Controller
{
    protected $Fee_invoices ;
    public function __construct(FeeInvoicesRepositoryInterface $Fee_invoices)
    {
        $this->Fee_invoices = $Fee_invoices ;
    }

    public function index()
    {
        return $this->Fee_invoices->index();   
    }

    
    public function create()
    {
       
    }

    public function show($id)
    {
        return $this->Fee_invoices->show($id);   
       
    }

  
    public function store(Request $request)
    {
        return $this->Fee_invoices->store($request);   
    }

    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
     
    }
}
