<?php

namespace App\Repository ;

interface SubjectRepositoryInterface{
    public function index();

    public function create();
    
    public function store($request);
}