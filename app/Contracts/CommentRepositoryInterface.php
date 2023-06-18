<?php

namespace App\Contracts;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

interface CommentRepositoryInterface
{
    /**
     * @param $model
     * @return Collection|LengthAwarePaginator
     */
    public function getAllByModel($model): Collection|LengthAwarePaginator;

    /**
     * @param $id
     * @return object
     */
    public function getOne($id): object;
}
