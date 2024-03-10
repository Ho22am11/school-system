<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
class Promotion extends Model
{
    protected $guarded=[];

    public function students(){
        return $this->belongsTo('App\Models\Student' , 'student_id');
    }
    public function f_grades(){
        return $this->belongsTo('App\Models\Grade' , 'from_grade');
    }

    public function f_classrooms(){
        return $this->belongsTo('App\Models\Classroom' , 'from_classroom');
    }

    public function f_sections(){
        return $this->belongsTo('App\Models\Section' , 'from_section');
    }
    public function n_grades(){
        return $this->belongsTo('App\Models\Grade' , 'to_grade');
    }

    public function n_classrooms(){
        return $this->belongsTo('App\Models\Classroom' , 'to_classroom');
    }

    public function n_sections(){
        return $this->belongsTo('App\Models\Section' , 'to_section');
    }

}
