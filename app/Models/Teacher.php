<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Teacher extends Model
{
    use HasFactory;
    use HasTranslations ;
    public $translatable =['Name'];
    protected $fillable = [
        'Name', 'Email' ,'Password' ,'Specialization_id' ,'Gender_id' ,'Joining_Date' ,'Address'
  
    
    ];

}
