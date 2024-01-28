<?php

namespace App\Repository;

use App\Models\Teacher;

class TeacherRepository implements TeacherepositoryInterface {

    public function get_teachers(){
        return Teacher::all();
    }
}