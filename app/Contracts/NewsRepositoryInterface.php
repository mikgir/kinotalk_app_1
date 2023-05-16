<?php

namespace App\Contracts;


use App\Models\News;

interface NewsRepositoryInterface
{
    public function getAll();

    public function getOne($id);


}
