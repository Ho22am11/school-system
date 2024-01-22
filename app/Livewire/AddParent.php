<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Nationalitie;
use App\Models\Religion;
use App\Models\status;
use App\Models\My_Parent;
use Illuminate\Support\Facades\Hash;

class AddParent extends Component
{
    public $successMessage ='';
    public $currentStep = 1,

    // Father_INPUTS
    $Email, $Password,
    $Name_Father, $Name_Father_en,
    $National_ID_Father, 
    $Phone_Father, $Job_Father, $Job_Father_en,
    $Nationality_Father_id, 
    $Address_Father, $Religion_Father_id, $status_father,
    $updateMode,

    // Mother_INPUTS
    $Name_Mother, $Name_Mother_en, $id , 
    $National_ID_Mother, $Phone_Mother, $Job_Mother, $Job_Mother_en,
    $Nationality_Mother_id, 
    $Address_Mother, $status_Mother ,$Religion_Mother_id,
    $catchError;


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'Email' => 'email' ,
            'Password' => 'min:8 | max:15',
            'National_ID_Father' => ' min:10 | max:10' ,
            'Phone_Father' => ' min:9 | max:9 ' ,
            'National_ID_Mother' => ' min:10 | max:10' ,
            'Phone_Mother' => ' min:9 | max:9 ' ,


        ]);
    }
    
    public function render()
    {
        return view('livewire.add-parent', [
            'Nationalities' => Nationalitie::all(),
            'Religions' =>  Religion::all(),
            "statuses" => status::all(),
        ]);
    }
  
    public function firstStepSubmit()
    {
        $this->validate([
            'Password' => 'required',
            'National_ID_Father' => 'required' ,
            'Phone_Father' => 'required',
            'Nationality_Father_id' => 'required',
            'Religion_Father_id' => 'required',
            'Address_Father' => 'required',
        ]);

        $this->currentStep = 2;
    }

    public function secundStepSubmit(){
        $this->validate([
                'Name_Mother' => 'required',
                'Name_Mother_en' => 'required',
                'National_ID_Mother' => 'required',
                'Phone_Mother' => 'required',
                'Job_Mother' => 'required',
                'Job_Mother_en' => 'required',
                'Nationality_Mother_id' => 'required',
                'Religion_Mother_id' => 'required',
                'Address_Mother' => 'required',
        

        ]);

        $this->currentStep = 3;
    }

    public function submitForm(){

        try {
            $My_Parent = new My_Parent ;
            // Father_INPUTS
            
            $My_Parent->Email = $this->Email;
            $My_Parent->Password = Hash::make($this->Password);
            $My_Parent->Name_Father = ['en' => $this->Name_Father_en, 'ar' => $this->Name_Father];
            $My_Parent->National_ID_Father = $this->National_ID_Father;
            $My_Parent->status_father_id = $this->status_father;
            $My_Parent->Phone_Father = $this->Phone_Father;
            $My_Parent->Job_Father = ['en' => $this->Job_Father_en, 'ar' => $this->Job_Father];
            $My_Parent->Nationality_Father_id = $this->Nationality_Father_id;
            $My_Parent->Religion_Father_id = $this->Religion_Father_id;
            $My_Parent->Address_Father = $this->Address_Father;
    
            // Mother_INPUTS
            $My_Parent->Name_Mother = ['en' => $this->Name_Mother_en, 'ar' => $this->Name_Mother];
            $My_Parent->National_ID_Mother = $this->National_ID_Mother;
            $My_Parent->status_Mother_id = $this->status_Mother;
            $My_Parent->Phone_Mother = $this->Phone_Mother;
            $My_Parent->Job_Mother = ['en' => $this->Job_Mother_en, 'ar' => $this->Job_Mother];
            $My_Parent->Nationality_Mother_id = $this->Nationality_Mother_id;
            $My_Parent->Religion_Mother_id = $this->Religion_Mother_id;
            $My_Parent->Address_Mother = $this->Address_Mother;
    
            $My_Parent->save();
           $this->successMessage = trans('message.success');
           $this->clearForm();

        }
        catch(\Exception $e){
            $this->catchError = $e->getMessage() ;
        }
       

    }
    public function clearForm()
    {
        $this->Email = '' ;
        $this->Password = '';
        $this->Name_Father = '';
        $this->Job_Father = '';
        $this->Job_Father_en = '';
        $this->Name_Father_en = '';
        $this->Nationality_Father_id = 64 ;
        $this->National_ID_Father = '' ;
        $this->Religion_Father_id = 1;
        $this->status_father = 1 ;
        $this->Phone_Father = '';
        $this->Address_Father ='';

        $this->Name_Mother = '';
        $this->Job_Mother = '';
        $this->Job_Mother_en = '';
        $this->Name_Mother_en = '';
        $this->Phone_Mother = '';
        $this->Address_Mother ='';
        $this->National_ID_Mother = '' ;
        $this->Nationality_Mother_id = 64 ;
        $this->Religion_Mother_id = 1;
        $this->status_Mother = 1 ;
        
        $this->currentStep = 1 ;
   

    }

    public function back($step)
    {
        $this->currentStep = $step ;
    }
    
}
