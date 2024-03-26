<?php

namespace App\Repository ;

use App\Models\FundAccount;
use App\Models\PaymentStudent;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;

class PaymentRepository implements PaymentRepositoryInterface{
    
    public function index(){
        $payments = PaymentStudent::all();

        return view('student.payment.index' , compact('payments'));
    }
    
    public function show($id){
        $student = Student::find($id);
        return view('student.payment.add' , compact('student'));
    }

    public function store($request){

        DB::beginTransaction();
        $payment = new  PaymentStudent();
        $payment->date = date('Y-m-d') ;
        $payment->amount = $request->amount ;
        $payment->student_id = $request->student_id ;
        $payment->save();

        $account = new StudentAccount() ;
        $account->date = date('Y-m-d') ;
        $account->type = 'payment' ;
        $account->Debit = $request->amount ;
        $account->credit = 0.00 ;
        $account->student_id = $request->student_id ;
        $account->payment_id = $payment->id ;
        $account->save();

        $fund = new FundAccount();
        $fund->date = date('Y-m-d') ;
        $fund->payment_id =  $payment->id ;
        $fund->Debit = 0.00 ;
        $fund->credit = $request->amount ;
        $fund->save();

        DB::commit();

        return redirect()->route('payment_student.index');
    }
}