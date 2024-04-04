<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Exam extends Model
{
    use HasFactory;

    use HasTranslations;

    public $translatable =['name'] ;

    protected $guarded = [];


    public function subjects(){
        return $this->belongsTo('App\Models\Subject' ,'subject_exam' );
    }
}
