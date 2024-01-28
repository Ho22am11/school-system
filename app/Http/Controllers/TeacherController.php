<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\TeacherepositoryInterface;
class TeacherController extends Controller
{

    public $Teacher ;
    public function __construct(TeacherepositoryInterface $Teacher)
    {
        $this->Teacher = $Teacher ;
        
    }

    public function index()
    {
       
        $xx =$this->Teacher->get_teachers();
       dd($xx); 
    }
}
