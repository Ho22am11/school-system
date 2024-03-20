<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeInvoices extends Model
{
    use HasFactory ;
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

    public function students()
    {
        return $this->belongsTo('App\Models\Student' , 'student_id');

    }

}
