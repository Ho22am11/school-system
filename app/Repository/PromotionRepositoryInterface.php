<?php 

namespace App\Repository ;

interface PromotionRepositoryInterface{

    public function index();

    public function store($request);
}