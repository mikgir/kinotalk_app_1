<?php

namespace App\Repositories;

use App\Contracts\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class UserRepository implements UserRepositoryInterface
{
    use HasRoles;

    /**
     * @return Collection|array
     */
    public function getAll(): Collection|array
    {

    }

    /**
     * @param int $id
     * @return User
     */
    public function getOne(int $id): User
    {
        return User::findOrFail($id);
    }

}
