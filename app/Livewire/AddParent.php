<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Nationalitie;
use App\Models\Religion;
use App\Models\status;
class AddParent extends Component
{
    
    public $currentStep = 1,

    // Father_INPUTS
    $Email, $Password,
    $Name_Father, $Name_Father_en,
    $National_ID_Father, $Passport_ID_Father,
    $Phone_Father, $Job_Father, $Job_Father_en,
    $Nationality_Father_id, $Blood_Type_Father_id,
    $Address_Father, $Religion_Father_id, $status_father,
    $updateMode,

    // Mother_INPUTS
    $Name_Mother, $Name_Mother_en, 
    $National_ID_Mother, $Passport_ID_Mother,
    $Phone_Mother, $Job_Mother, $Job_Mother_en,
    $Nationality_Mother_id, $Blood_Type_Mother_id,
    $Address_Mother, $status_Mother ,$Religion_Mother_id;

    public function updated($field)
    {
        $this->validate([
            'Email' => 'email' ,
            'Password' => 'min:8 | max:15',
            'National_ID_Father' => ' min:10 | max:10' ,
            'Phone_Father' => ' min:9 | max:9 ' ,
            'National_ID_Mother' => ' min:10 | max:10' ,
            'Phone_Mother' => ' min:9 | max:9 ' ,


        ]);
    }

    protected $messages = [
        'Email.email' => 'The Email Address format is not valid.',
        
    ];

    public function render()
    {
        return view('livewire.add-parent', [
            'Nationalities' => Nationalitie::all(),
            'Religions' =>  Religion::all(),
            "statuses" => status::all(),
        ]);
    }
  
    public function firstStepSubmit($step)
    {
        $this->currentStep = $step;
    }

    public function back($step)
    {
        $this->currentStep = $step ;
    }
    
}
