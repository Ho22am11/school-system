<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Section extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['name'];
    protected $fillable = [
        'name',
        'grade_id',
        'classroom_id',
        'status',
    ];
    public function grade(){
        return $this->belongsTo(Grade::class);
    }
    public function classroom(){
        return $this->belongsTo(Classroom::class);
    }

   // relationship many to many with section table
    public function teachers(){
        return $this->belongsToMany('App\Models\Teacher' , 'teacher_section');
    }
}
