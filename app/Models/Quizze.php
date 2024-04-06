<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Quizze extends Model
{
    use HasFactory;

    use HasTranslations ;
    public $translatable = ['name'];
    protected $guarded = [];

    public function subjects(){
        return $this->belongsTo('App\Models\Subject' ,'subject_id');
    }
    public function teachers(){
        return $this->belongsTo('App\Models\Teacher' ,'teacher_id');
    }
    public function grades(){
        return $this->belongsTo('App\Models\Grade' ,'grade_id');
    }
    public function classrooms(){
        return $this->belongsTo('App\Models\Classroom' ,'classroom_id');
    }
    public function sections(){
        return $this->belongsTo('App\Models\Section' ,'section_id');
    }
}
