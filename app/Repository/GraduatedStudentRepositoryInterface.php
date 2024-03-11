<?php

namespace App\Repository ;

interface GraduatedStudentRepositoryInterface {
    
    public function index();

    public function create();

    public function softdelete($request);

    public function ReturnStudent($request);

    public function destroy($id);


    
}