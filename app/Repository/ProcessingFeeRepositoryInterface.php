<?php

namespace App\Repository ;

interface ProcessingFeeRepositoryInterface {
    public function index();
    
    public function show($id);

    public function store($request);
}