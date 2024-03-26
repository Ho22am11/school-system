<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Repository\PaymentRepositoryInterface;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    protected $Payment ;

    public function __construct(PaymentRepositoryInterface $Payment)
    {
        $this->Payment = $Payment ;
    }
    
    public function index()
    {
        return $this->Payment->index();
    }

   
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->Payment->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return $this->Payment->show($id);
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        
    }
}
