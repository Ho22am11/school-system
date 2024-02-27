<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class image extends Model
{
   public $fillable = [ 'filename' , 'imageable_id' , 'imageable_type'];
   public function imageable()
   {
     return $this->morphTo();
   }

}
