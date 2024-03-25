<?php

namespace App\Repository ;

use App\Models\ProcessingFee;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;

class ProcessingFeeRepository implements ProcessingFeeRepositoryInterface {
    
    public function index(){
        $process_fees = ProcessingFee::all();
        return view('student.ProcessFee.index' , compact('process_fees'));
    }

    public function show($id){
        $student = Student::find($id);
        return view('student.ProcessFee.add' , compact('student'));
    }
    public function store($request){

        DB::beginTransaction();
       $fee = new ProcessingFee();
       $fee->date = date('Y-m-d');
       $fee->amount = $request->amount;
       $fee->student_id = $request->student_id;
       $fee->save();

       $account = new StudentAccount();
       $account->date = date('Y-m-d');
       $account->type = 'Exemption';
       $account->Debit = 0.00 ;
       $account->credit = $request->amount ;
       $account->student_id = $request->student_id;
       $account->processing_id = $fee->id ;
       $account->save();

       DB::commit();

       return redirect()->route('processing_fee.index');
     }
}