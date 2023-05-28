<?php

namespace App\Contracts;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

interface CommentRepositoryInterface
{
    /**
     * @param $id
     * @return Collection|LengthAwarePaginator
     */
    public function getAllByArticleId($id): Collection|LengthAwarePaginator;

    /**
     * @param $id
     * @return object
     */
    public function getOne($id): object;
}
