<?php

namespace App\Repository ;

interface QuizzeRepositoryInterface{

    public function index();

    public function create();

    public function show($id);

    public function store($request);
}