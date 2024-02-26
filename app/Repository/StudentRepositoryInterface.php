<?php

namespace App\Repository;
 
interface StudentRepositoryInterface{

    public function Create_Student();

    public function getsections($id);

    public function StoreStudent($request);

    public function ShowStudent();
}