<?php

namespace App\Contracts;


interface CategoryRepositoryInterface
{
    public function getAll();

    public function getOne($id);


}
