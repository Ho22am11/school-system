<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function quizzes(){
        return $this->belongsTo('App\Models\Quizze' , 'quizze_id') ;
    }
}
