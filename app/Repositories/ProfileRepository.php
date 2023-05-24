<?php

namespace App\Repositories;

use App\Contracts\ProfileRepositoryInterface;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class ProfileRepository implements ProfileRepositoryInterface
{
    use HasRoles;

    /**
     * @return Collection|array
     */
    public function getAll(): Collection|array
    {
        return Profile::with('user')
            ->orderBy('created_at')
            ->get();
    }

    /**
     * @param User $user
     * @param $id
     * @return Model|Collection|Builder|array|null
     */
    public function getOne(User $user, $id): Model|Collection|Builder|array|null
    {
        return Profile::with($user)->findOrFail($id);
    }

}
