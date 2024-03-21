<?php

namespace App\Repository ;

use App\Models\Fee;
use App\Models\FeeInvoices;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;

class FeeInvoicesRepository implements FeeInvoicesRepositoryInterface{

    public function index(){
        $fees = FeeInvoices::all();
        return view('pages.fee invoices.index' , compact('fees'));
    }

    public function show($id){

        $student = Student::findOrfail($id);
        $fees = Fee::where('classroom_id' , $student->classroom_id)->get();
        return view('pages.fee invoices.add' , compact('student' , 'fees'));
    }

    public function store($request){
        
       DB::beginTransaction();

        $fee = new FeeInvoices();
        $fee->invoices_date = date('Y-m-d');
        $fee->amount = $request->amount ;
        $fee->Grade_id  = $request->Grade_id;
        $fee->classroom_id  = $request->classroom_id;
        $fee->fee_id  = $request->type;
        $fee->student_id  = $request->student_id;
        $fee->save();

        $account = new StudentAccount() ;
        $account->date = date('Y-m-d');
        $account->type = 'invoices';
        $account->fee_invoice_id = $fee->id;
        $account->student_id =  $request->student_id;
        $account->Grade_id =  $request->Grade_id;
        $account->classroom_id  = $request->classroom_id;
        $account->Debit  = $request->amount;
        $account->credit  = 0.00;
        $account->save();
        DB::commit();
        return redirect()->route('student.index');

      

    }
};