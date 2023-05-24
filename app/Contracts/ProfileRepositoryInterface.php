<?php

namespace App\Contracts;

use App\Models\User;

interface ProfileRepositoryInterface
{
    public function getAll();

    public function getOne(User $user, $id);
}
