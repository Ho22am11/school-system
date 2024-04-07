<?php

namespace App\Repository ;

interface QuestionRepositoryInterface{

    public function index();

    public function create();

    public function show($id);

    public function store($request);
}