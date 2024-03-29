<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\Models\Status ;
class My_Parent extends Model
{
    use HasFactory;
    use HasTranslations ;
    public $translatable = ['Name_Father' , 'Job_Father' , 'Name_Mother' , 'Job_Mother'];
    protected $table = 'my__parents' ; // name table diffrent about name model
    protected $guarded = [];

    public function status(){
        return $this->belongsTo(Status::class);
    }

  

}
