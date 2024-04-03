<?php

namespace App\Repository ;

interface AttendanceRepositoryInterface{
    public function index();

    public function create();

    public function store($request);

    public function show($id);

    public function edit($attendance);

    public function update($attendance);

  
}