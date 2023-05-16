<?php

namespace App\Contracts;


use Illuminate\Database\Eloquent\Collection;

interface ArticleRepositoryInterface
{
    /**
     * @return Collection
     */
    public function getAll(): Collection;

    /**
     * @param $id
     * @return object
     */
    public function getOne($id): object;


}
