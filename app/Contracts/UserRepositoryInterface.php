<?php

namespace App\Contracts;

interface UserRepositoryInterface
{
    public function getAll();

    public function getOne(int $id);
}
