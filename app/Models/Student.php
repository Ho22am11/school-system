<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Student extends Model
{
    use HasFactory ,HasTranslations;
    public $translatable =['name'] ;
    protected $guarded = [];

    public function grades(){
        return $this->belongsTo('App\Models\Grade' , 'Grade_id');
    }

    public function classrooms(){
        return $this->belongsTo('App\Models\Classroom' , 'classroom_id');
    }

    public function sections(){
        return $this->belongsTo('App\Models\Section' , 'section_id');
    }

     public function genders(){
        return $this->belongsTo('App\Models\Gender' , 'Gender_id');
    }

    public function images(){
        return $this->morphMany('App\Models\image' , 'imageable');
    }
   
}
