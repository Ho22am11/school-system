<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;
use App\Models\specialization;
use App\Models\Gender;
class Teacher extends Model
{
    use HasFactory;
    use HasTranslations ;
    public $translatable =['Name'];
    protected $fillable = [
        'Name', 'Email' ,'Password' ,'Specialization_id' ,'Gender_id' ,'Joining_Date' ,'Address'
  
    
    ];

    public function specializations(){
        return $this->belongsTo('App\Models\specialization' , 'Specialization_id');
    }

    public function genders(){
        return $this->belongsTo('App\Models\Gender' , 'Gender_id');
    }

    // relationship many to many with section table
    public function sections(){
        return $this->belongsToMany('App\Models\Section' , 'teacher_section');
    }

}
