<?php

namespace App\Repository ;

use PhpOffice\PhpSpreadsheet\Calculation\Statistical\Distributions\F;

interface FeeInvoicesRepositoryInterface{

    public function index();

    public function show($id);

    public function store($request);
};