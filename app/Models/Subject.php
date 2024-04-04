<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Subject extends Model
{
    use HasTranslations;
    use HasFactory;
    public $translatable = ['name'];

    protected $guarded = [];


    public function grades(){
        return $this->belongsTo('App\Models\Grade' , 'Grade_id');
    }

    public function classrooms(){
        return $this->belongsTo('App\Models\Classroom' , 'Classroom_id');
    }

    public function teachers(){
        return $this->belongsTo('App\Models\Teacher' , 'teacher_id');
    }
}

