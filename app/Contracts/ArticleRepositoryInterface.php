<?php

namespace App\Contracts;


use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

interface ArticleRepositoryInterface
{
    /**
     * @return Collection|LengthAwarePaginator
     */
    public function getAll(): Collection|LengthAwarePaginator;

    /**
     * @param $id
     * @return object
     */
    public function getOne($id): object;


}
