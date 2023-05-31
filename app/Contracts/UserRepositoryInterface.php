<?php

namespace App\Contracts;

use App\Models\User;

interface UserRepositoryInterface
{
    public function getAll();

    public function getOne(int $id);
}
