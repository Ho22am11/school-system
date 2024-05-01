<?php

namespace App\Repository ;

use App\Models\FundAccount;
use App\Models\ReceptStudent;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;

class ReceiptStudentRepository implements ReceiptStudentRepositoryInterface{


    public function index(){

      $receipt_students = ReceptStudent::all();
      return view('student.receipt.index' , compact('receipt_students'));
    }

    public function show($id){
        $student = Student::findOrfail($id);
        return view('student.receipt.add' , compact('student'));
    }

    public function store($request){
       
      DB::beginTransaction();
     
       $receipt_students = new ReceptStudent();
       $receipt_students->date = date('Y-m-d');
       $receipt_students->student_id = $request->student_id;
       $receipt_students->Debit = $request->amount;   
       $receipt_students->save();
       

       $fund = new FundAccount();
       $fund->date = date('Y-m-d');
       $fund->receipt_id = $receipt_students->id;
       $fund->Debit =$request->amount;
       $fund->credit = 0.00 ;
       $fund->save();


       $accunt = new StudentAccount();
       $accunt->date =  date('Y-m-d');
       $accunt->type =  'receipt';
       $accunt->Debit =  0.00;
       $accunt->credit =  $request->amount ;
       $accunt->student_id =   $request->student_id ;
       $accunt->receipt_id =   $receipt_students->id ;
       $accunt->save();


      DB::commit();

      return back();

    }

    public function edit($id){

      $receipt = ReceptStudent::find($id);
      return view('student.receipt.edit' , compact('receipt'));
    }


    public function update($request){
      ReceptStudent::find($request->id)->update([
        'Debit' => $request->amount 
      ]);

      FundAccount::where('receipt_id' , $request->id)->update([
        'Debit' => $request->amount 
      ]);

      StudentAccount::where('receipt_id' , $request->id)->update([
        'credit' => $request->amount 
      ]);

      return redirect()->route('recepit_student.index');
    }


    
} 