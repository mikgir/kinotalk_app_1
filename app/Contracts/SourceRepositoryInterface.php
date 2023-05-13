<?php

namespace App\Contracts;


interface SourceRepositoryInterface
{
    public function getAll();

    public function getOne();


}
