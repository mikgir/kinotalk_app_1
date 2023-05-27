<?php

namespace App\Contracts;


use App\Models\News;

interface NewsRepositoryInterface
{
    public function getAll();

    /**
     * @param int $id
     * @return News
     */
    public function getOne(int $id): News;


}
