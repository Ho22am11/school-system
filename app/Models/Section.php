<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Section extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['name' , 'status'];
    protected $fillable = [
        'name',
        'grade_id',
        'classroom_id',
        'status',
    ];
}
